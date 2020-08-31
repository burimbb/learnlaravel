<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBi3dAH3T4QMeGe5sAzkaghkAeEwBUrqgA&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
   
  </head>
  <body>
    <div id="map-canvas-top">
        <iframe width="100%" height="215" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed/v1/search?q=42.365853,+21.154497&amp;key=AIzaSyD3aV_E9nh2KPcQJJWI-L5Pd1zcmn7edl4"></iframe>
    </div>
  </body>
</html>