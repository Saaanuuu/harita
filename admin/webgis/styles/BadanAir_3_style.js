var size = 0;
var placement = "point";
function categories_BadanAir_3(
  feature,
  value,
  size,
  resolution,
  labelText,
  labelFont,
  labelFill,
  bufferColor,
  bufferWidth,
  placement
) {
  switch (value.toString()) {
    case "Danau Karo":
      return [
        new ol.style.Style({
          stroke: new ol.style.Stroke({
            color: "rgba(35,35,35,1.0)",
            lineDash: null,
            lineCap: "butt",
            lineJoin: "miter",
            width: 0,
          }),
          fill: new ol.style.Fill({ color: "rgba(66,255,160,1.0)" }),
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
      break;
    case "Danau Loji":
      return [
        new ol.style.Style({
          stroke: new ol.style.Stroke({
            color: "rgba(35,35,35,1.0)",
            lineDash: null,
            lineCap: "butt",
            lineJoin: "miter",
            width: 0,
          }),
          fill: new ol.style.Fill({ color: "rgba(66,255,160,1.0)" }),
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
      break;
    case "Sungai Akelamo":
      return [
        new ol.style.Style({
          stroke: new ol.style.Stroke({
            color: "rgba(35,35,35,1.0)",
            lineDash: null,
            lineCap: "butt",
            lineJoin: "miter",
            width: 0,
          }),
          fill: new ol.style.Fill({ color: "rgba(150,255,255,1.0)" }),
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
      break;
  }
}

var style_BadanAir_3 = function (feature, resolution) {
  var context = {
    feature: feature,
    variables: {},
  };
  var value = feature.get("Ket");
  var labelText = "";
  size = 0;
  var labelFont = "10px, sans-serif";
  var labelFill = "#000000";
  var bufferColor = "";
  var bufferWidth = 0;
  var textAlign = "left";
  var offsetX = 8;
  var offsetY = 3;
  var placement = "point";
  if ("" !== null) {
    labelText = String("");
  }

  var style = categories_BadanAir_3(
    feature,
    value,
    size,
    resolution,
    labelText,
    labelFont,
    labelFill,
    bufferColor,
    bufferWidth,
    placement
  );

  return style;
};
