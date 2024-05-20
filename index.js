function initMap() {
    const routes = [
        { from: "98001", to: "98002" },
        { from: "98003", to: "98004" },
        { from: "32669", to: "98004" },
    ];

    const allowedPostalCodes = [];
    const startLoc = document.getElementById("start-loc");
    const endLoc = document.getElementById("end-loc");
    const options = {
        fields: ["formatted_address", "geometry", "name", "address_components"],
        strictBounds: false,
        componentRestrictions: {
            country: "us",
            postalCode: allowedPostalCodes,
        },
    };

    const startLocAutocomplete = new google.maps.places.Autocomplete(
        startLoc,
        options
    );
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

        const startZipCode = extractZipCode(startPlace.address_components);

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

            const endZipCode = extractZipCode(endPlace.address_components);

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
    });
}

function extractZipCode(addressComponents) {
    const addressZipCodeData = addressComponents.find((component) =>
        component.types.includes("postal_code")
    );
    if (addressZipCodeData) {
        return addressZipCodeData.long_name;
    } else {
        window.alert("Zipcode for the following location does not exist!");
    }
}

function validateRoute(startZipCode, endZipCode, routes) {
    if (!routes.length) {
        return true;
    }
    return routes.some(
        (route) => route.from === startZipCode && route.to === endZipCode
    );
}

window.initMap = initMap;
