var wms_layers = [];

var lyr_EsriImagery_0 = new ol.layer.Tile({
  title: "Esri Imagery",
  type: "base",
  opacity: 1.0,

  source: new ol.source.XYZ({
    attributions: " ",
    url: "https://services.arcgisonline.com/arcgis/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}",
  }),
});

var lyr_GoogleSatellite_1 = new ol.layer.Tile({
  title: "Google Satellite",
  type: "base",
  opacity: 1.0,

  source: new ol.source.XYZ({
    attributions: " ",
    url: "https://mt0.google.com/vt/lyrs=s&x={x}&y={y}&z={z}",
  }),
});

var lyr_OpenStreetMap_2 = new ol.layer.Tile({
  title: "OpenStreetMap",
  type: "base",
  opacity: 1.0,

  source: new ol.source.XYZ({
    attributions: " ",
    url: "https://tile.openstreetmap.org/{z}/{x}/{y}.png",
  }),
});
var format_BadanAir_3 = new ol.format.GeoJSON();
var features_BadanAir_3 = format_BadanAir_3.readFeatures(json_BadanAir_3, {
  dataProjection: "EPSG:4326",
  featureProjection: "EPSG:3857",
});
var jsonSource_BadanAir_3 = new ol.source.Vector({
  attributions: " ",
});
jsonSource_BadanAir_3.addFeatures(features_BadanAir_3);
var lyr_BadanAir_3 = new ol.layer.Vector({
  declutter: true,
  source: jsonSource_BadanAir_3,
  style: style_BadanAir_3,
  interactive: true,
  title:
    'Badan Air<br />\
    <img src="styles/legend/BadanAir_3_0.png" /> Danau Karo<br />\
    <img src="styles/legend/BadanAir_3_1.png" /> Danau Loji<br />\
    <img src="styles/legend/BadanAir_3_2.png" /> Sungai Akelamo<br />',
});
var format_TitikSamplingAirLaut_4 = new ol.format.GeoJSON();
var features_TitikSamplingAirLaut_4 =
  format_TitikSamplingAirLaut_4.readFeatures(json_TitikSamplingAirLaut_4, {
    dataProjection: "EPSG:4326",
    featureProjection: "EPSG:3857",
  });
var jsonSource_TitikSamplingAirLaut_4 = new ol.source.Vector({
  attributions: " ",
});
jsonSource_TitikSamplingAirLaut_4.addFeatures(features_TitikSamplingAirLaut_4);
var lyr_TitikSamplingAirLaut_4 = new ol.layer.Vector({
  declutter: true,
  source: jsonSource_TitikSamplingAirLaut_4,
  style: style_TitikSamplingAirLaut_4,
  interactive: true,
  title:
    '<img src="styles/legend/TitikSamplingAirLaut_4.png" /> Titik Sampling Air Laut',
});
var format_TitikSamplingAirPermukaan_5 = new ol.format.GeoJSON();
var features_TitikSamplingAirPermukaan_5 =
  format_TitikSamplingAirPermukaan_5.readFeatures(
    json_TitikSamplingAirPermukaan_5,
    { dataProjection: "EPSG:4326", featureProjection: "EPSG:3857" }
  );
var jsonSource_TitikSamplingAirPermukaan_5 = new ol.source.Vector({
  attributions: " ",
});
jsonSource_TitikSamplingAirPermukaan_5.addFeatures(
  features_TitikSamplingAirPermukaan_5
);
var lyr_TitikSamplingAirPermukaan_5 = new ol.layer.Vector({
  declutter: true,
  source: jsonSource_TitikSamplingAirPermukaan_5,
  style: style_TitikSamplingAirPermukaan_5,
  interactive: true,
  title:
    '<img src="styles/legend/TitikSamplingAirPermukaan_5.png" /> Titik Sampling Air Permukaan',
});
var format_ToponimObi_6 = new ol.format.GeoJSON();
var features_ToponimObi_6 = format_ToponimObi_6.readFeatures(
  json_ToponimObi_6,
  { dataProjection: "EPSG:4326", featureProjection: "EPSG:3857" }
);
var jsonSource_ToponimObi_6 = new ol.source.Vector({
  attributions: " ",
});
jsonSource_ToponimObi_6.addFeatures(features_ToponimObi_6);
var lyr_ToponimObi_6 = new ol.layer.Vector({
  declutter: true,
  source: jsonSource_ToponimObi_6,
  style: style_ToponimObi_6,
  interactive: true,
  title: '<img src="styles/legend/ToponimObi_6.png" /> Toponim Obi',
});
var group_Basemaps = new ol.layer.Group({
  layers: [lyr_EsriImagery_0, lyr_GoogleSatellite_1, lyr_OpenStreetMap_2],
  title: "Basemaps",
});

lyr_EsriImagery_0.setVisible(true);
lyr_GoogleSatellite_1.setVisible(true);
lyr_OpenStreetMap_2.setVisible(true);
lyr_BadanAir_3.setVisible(false);
lyr_TitikSamplingAirLaut_4.setVisible(true);
lyr_TitikSamplingAirPermukaan_5.setVisible(true);
lyr_ToponimObi_6.setVisible(true);
var layersList = [
  group_Basemaps,
  lyr_BadanAir_3,
  lyr_TitikSamplingAirLaut_4,
  lyr_TitikSamplingAirPermukaan_5,
  lyr_ToponimObi_6,
];
lyr_BadanAir_3.set("fieldAliases", { fid: "fid", id: "id", Ket: "Ket" });
lyr_TitikSamplingAirLaut_4.set("fieldAliases", {
  Lokasi: "Lokasi",
  Kode: "Kode",
  Lon: "Lon",
  Lat: "Lat",
  PIC: "PIC",
  Sampel: "Sampel",
  Detail: "Detail",
});
lyr_TitikSamplingAirPermukaan_5.set("fieldAliases", {
  Lokasi: "Lokasi",
  Kode: "Kode",
  Lon: "Lon",
  Lat: "Lat",
  PIC: "PIC",
  Sampel: "Sampel",
  Detail: "Detail",
});
lyr_ToponimObi_6.set("fieldAliases", { fid: "fid", id: "id", Name: "Name" });
lyr_BadanAir_3.set("fieldImages", { fid: "", id: "TextEdit", Ket: "TextEdit" });
lyr_TitikSamplingAirLaut_4.set("fieldImages", {
  Lokasi: "TextEdit",
  Kode: "TextEdit",
  Lon: "TextEdit",
  Lat: "TextEdit",
  PIC: "TextEdit",
  Sampel: "TextEdit",
  Detail: "TextEdit",
});
lyr_TitikSamplingAirPermukaan_5.set("fieldImages", {
  Lokasi: "TextEdit",
  Kode: "TextEdit",
  Lon: "TextEdit",
  Lat: "TextEdit",
  PIC: "TextEdit",
  Sampel: "TextEdit",
  Detail: "TextEdit",
});
lyr_ToponimObi_6.set("fieldImages", {
  fid: "",
  id: "TextEdit",
  Name: "TextEdit",
});
lyr_BadanAir_3.set("fieldLabels", {
  fid: "no label",
  id: "no label",
  Ket: "no label",
});
lyr_TitikSamplingAirLaut_4.set("fieldLabels", {
  Lokasi: "inline label",
  Kode: "inline label",
  Lon: "inline label",
  Lat: "inline label",
  PIC: "inline label",
  Sampel: "inline label",
  Detail: "inline label",
});
lyr_TitikSamplingAirPermukaan_5.set("fieldLabels", {
  Lokasi: "inline label",
  Kode: "inline label",
  Lon: "inline label",
  Lat: "inline label",
  PIC: "inline label",
  Sampel: "inline label",
  Detail: "inline label",
});
lyr_ToponimObi_6.set("fieldLabels", {
  fid: "no label",
  id: "no label",
  Name: "no label",
});
lyr_ToponimObi_6.on("precompose", function (evt) {
  evt.context.globalCompositeOperation = "normal";
});
