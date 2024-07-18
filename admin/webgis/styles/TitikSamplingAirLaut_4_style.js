var size = 0;
var placement = "point";

var style_TitikSamplingAirLaut_4 = function (feature, resolution) {
  var context = {
    feature: feature,
    variables: {},
  };
  var value = "";
  var labelText = "";
  size = 0;
  var labelFont = "10.4px 'Arial', sans-serif";
  var labelFill = "#323232";
  var bufferColor = "#fafafa";
  var bufferWidth = 0.5;
  var textAlign = "left";
  var offsetX = 8;
  var offsetY = 3;
  var placement = "point";
  if (feature.get("Kode") !== null) {
    labelText = String(feature.get("Kode"));
  }
  var style = [
    new ol.style.Style({
      image: new ol.style.Circle({
        radius: 10.0 + size,
        stroke: new ol.style.Stroke({
          color: "rgba(50,87,128,1.0)",
          lineDash: null,
          lineCap: "butt",
          lineJoin: "miter",
          width: 1,
        }),
        fill: new ol.style.Fill({ color: "rgba(72,123,182,1.0)" }),
      }),
      text: createTextStyle(
        feature,
        resolution,
        labelText,
        labelFont,
        labelFill,
        placement,
        bufferColor,
        bufferWidth
      ),
    }),
  ];

  return style;
};
