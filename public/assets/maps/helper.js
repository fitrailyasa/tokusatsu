async function getGeoJSON(UrlTogeoJSON) {
    try {
        const response = await fetch(UrlTogeoJSON);
        const data = await response.json();

        return data;
    } catch (err) {
        console.log(err);
    }
}

function getRandomColorForPolygon() {
    var letters = "0123456789ABCDEF";
    var color = "#";
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

function rgbStringToHex(rgbString) {
    const [r, g, b] = rgbString.split(" ").map(Number);

    const toHex = (num) => {
        const hex = num.toString(16);
        return hex.length === 1 ? "0" + hex : hex;
    };

    return `#${toHex(r)}${toHex(g)}${toHex(b)}`;
}

function styleFeature(feature) {
    var color = getRandomColorForPolygon();
    return {
        fillColor: color,
        weight: 0,
        opacity: 1,
        dashArray: "3",
        fillOpacity: 0.7,
    };
}

function featureCostumIcon(icon) {
    return L.icon({
        iconUrl: icon,
        iconSize: [30, 30],
        iconAnchor: [15, 15],
        popupAnchor: [0, -15],
    });
}

function panelCostumIcon(icon) {
    return `<i class="leaflet_icon" style="background: url('${icon}') center center no-repeat;"></i>`;
}

function panelCostumIconColor(color) {
    return `<i class="leaflet_icon" style="background: ${color} center center no-repeat; color: ${color};"></i>`;
}

function createDynamicLegend(layer, properties) {
    var legendContainer = L.DomUtil.get("legend-container");

    if (!legendContainer) {
        legendContainer = L.DomUtil.create(
            "div",
            "legend-container",
            map._controlCorners["bottomleft"]
        );
        legendContainer.id = "legend-container";
    }

    var legend = L.DomUtil.create("div", "info legend", legendContainer);

    featureColor = {};

    layer.eachLayer(function (feature) {
        var color = feature.options.fillColor;
        featureColor[feature.feature.properties[properties.field]] = color;
    });

    legend.innerHTML = `<h5>${properties.title}</h5>`;

    for (var name in featureColor) {
        var color = featureColor[name];
        legend.innerHTML +=
            '<div class="lagend-text" ><i style="background:' +
            color +
            '"></i> ' +
            name +
            "</div>";
    }
}

function addLegend(layer, properties) {
    if (!map.hasLayer(layer)) return;
    createDynamicLegend(layer, properties);
}

function removeLegend(layerProperties) {
    var legendContainer = L.DomUtil.get("legend-container");

    if (legendContainer) {
        const legends = legendContainer.children;

        for (let i = 0; i < legends.length; i++) {
            const legend = legends[i];
            if (
                legend.querySelector("h5").innerText === layerProperties.title
            ) {
                legendContainer.removeChild(legend);
                break;
            }
        }
    }
}
