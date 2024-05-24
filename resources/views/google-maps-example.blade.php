<!DOCTYPE html>
<!--
 @license
 Copyright 2019 Google LLC. All Rights Reserved.
 SPDX-License-Identifier: Apache-2.0
-->
<html>

<head>
    <title>Place Autocomplete</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <!-- jsFiddle will insert css and js -->
</head>

<body>
    <input style="width: 500px" id="zone_from" type="text" placeholder="Enter a start location" />
    <br />
    <input style="width: 500px" id="zone_to" type="text" placeholder="Enter a end location" />

    <input type="hidden" id="google_site_key" value={{ config('google_maps.GOOGLE_SITE_KEY') }}>
    <!--
      The `defer` attribute causes the callback to execute after the full HTML
      document has been parsed. For non-blocking uses, avoiding race conditions,
      and consistent behavior across browsers, consider loading using Promises.
      See https://developers.google.com/maps/documentation/javascript/load-maps-js-api
      for more information.
      -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const googleSiteKeyInput = document.getElementById("google_site_key");
            if (googleSiteKeyInput) {
                const googleSiteKey = googleSiteKeyInput.value;

                (function(d, s, id) {
                    var js, gjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;

                    js = d.createElement(s);
                    js.id = id;
                    js.src = 'https://maps.googleapis.com/maps/api/js?key=' + googleSiteKey +
                        '&callback=initMap&libraries=places';
                    js.onerror = function() {
                        console.error('Google Maps API failed to load.');
                    };
                    gjs.parentNode.insertBefore(js, gjs);
                }(document, 'script', 'google-maps-api'));
            } else {
                console.error('Google Site Key input field not found.');
            }
        });
    </script>

    <script src="{{ asset('assets/js/plugin.min.js') }}"></script>

    <script>
        async function getZonalFare() {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            try {
                const response = await $.ajax({
                    type: 'GET',
                    url: "{{ route('get-zonal-fare') }}",
                    data: {
                        _token: csrfToken,
                    },
                    dataType: 'json'
                });
                return response;
            } catch (error) {
                console.error('Error fetching zonal fare:', error);
                throw error;
            }
        }


        async function initMap() {
            const routes = await getZonalFare();
            console.log(routes)
            const allowedPostalCodes = new Set(
                routes.flatMap(route => [route.from, route.to])
            );
            // const allowedPostalCodes = [];
            const startLoc = document.getElementById("zone_from");
            const endLoc = document.getElementById("zone_to");
            const options = {
                fields: [
                    "formatted_address",
                    "geometry",
                    "name",
                    "address_components",
                ],
                strictBounds: false,
                componentRestrictions: {
                    country: "us",
                },
            };

            const startLocAutocomplete =
                new google.maps.places.Autocomplete(startLoc, options);
            const endLocAutocomplete = new google.maps.places.Autocomplete(
                endLoc,
                options
            );
            startLocAutocomplete.addListener("place_changed", () => {
                const startPlace = startLocAutocomplete.getPlace();

                if (!startPlace.geometry || !startPlace.geometry.location) {
                    window.alert(
                        "We do not provide zonal services in this area. Please enter a location within the following postal codes: " +
                        allowedPostalCodes.join(", ") +
                        " or use route type location"
                    );
                    return;
                }

                const startZipCode = extractZipCode(
                    startPlace.address_components
                );
                let endZipCode;
                endLocAutocomplete.addListener("place_changed", () => {
                    const endPlace = endLocAutocomplete.getPlace();

                    if (!endPlace.geometry || !endPlace.geometry.location) {
                        window.alert(
                            "We do not provide zonal services in this area. Please enter a location within the following postal codes: " +
                            allowedPostalCodes.join(", ") +
                            " or use route type location"
                        );
                        return;
                    }

                    endZipCode = extractZipCode(
                        endPlace.address_components
                    );
                    console.log("startZipCode: " + startZipCode)
                    console.log("endZipCode: " + endZipCode)

                    const isValidRoute = validateRoute(
                        startZipCode,
                        endZipCode,
                        routes
                    );

                    if (isValidRoute) {
                        console.log("Valid route!");
                    } else {
                        let validRoutesString = "Valid routes:\n";
                        for (const route of routes) {
                            validRoutesString += `  * ${route.from} to ${route.to}\n`;
                        }
                        alert(
                            validRoutesString +
                            "Please choose from the listed routes zipcodes."
                        );
                    }
                });
                // Handle missing end location
                if (!endZipCode) {
                    // Re-validate route after a start location change
                    validateRoute(startZipCode, endZipCode, routes); // Use stored endZipCode
                }
            });
        }

        function extractZipCode(addressComponents) {
            const addressZipCodeData = addressComponents.find((component) =>
                component.types.includes("postal_code")
            );
            if (addressZipCodeData) {
                return addressZipCodeData.long_name;
            } else {
                window.alert(
                    "Zipcode for the following location does not exist!"
                );
            }
        }

        function validateRoute(startZipCode, endZipCode, routes) {
            const startLoc = document.getElementById("zone_from");
            const endLoc = document.getElementById("zone_to");
            console.log(startLoc.value, endLoc.value);
            if (!routes.length) {
                return true;
            }
            return routes.some(
                (route) =>
                route.from === startZipCode && route.to === endZipCode
            );
        }
        window.initMap = initMap;
    </script>
</body>

</html>
