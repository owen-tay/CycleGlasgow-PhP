<?php session_start();
include('includes/error-reporting.php');
include('includes/connx.php');
include('includes/session-chk-homepage.php');

$date = date('d-m-y H:i:s');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!--Header -->
    <?php include('modules/head.php'); ?>
</head>

<body>
    <!--Nav -->
    <?php include('includes/navbar.php'); ?>


    <!--map-->


    <div id="map" class="mx-3 rounded-lg"></div>
    <h1 class="p-3 text-2xl md:text-2xl font-bold text-black text-center">
        Glagows New Cycle Paths
    </h1>
    <h2 class=" text-1xl md:text-lg  text-cyan-500  text-center"><span class=" text-blue-500">Blue Markers</span> are NextBike bike rental stops,<span class="text-red-500"> Red Markers</span> are bike repair shops and coloured lines are
        offical cycle paths.</h2>
    <div
        class="flex bg-gray-100 pt-4 rounded flex-col md:flex-row items-start md:items-center justify-center mt-4 md:mt-8 ">
        <div class="flex flex-col items-start justify-center w-full md:w-1/2 px-4 mb-8 md:mb-0">
            <h1 class="text-2xl text-gray-700 font-bold mb-4 mt-2 p-4">Cycling Safely in Glasgow</h1>
            <p class="text-lg text-black mb-4 p-4">
                When it comes to cycling safely in Glasgow, there are a few key considerations to keep in mind. First
                and foremost, it is essential to familiarize yourself with the city's cycling infrastructure and
                designated routes. Glasgow has been actively expanding its cycling network, including dedicated cycle
                lanes and paths, so planning your routes accordingly can significantly enhance safety. Additionally,
                always remember to wear a helmet and high-visibility clothing, especially when riding in traffic.
                Adhering to traffic rules, such as signaling your intentions and obeying traffic lights, is crucial for
                your safety and the safety of others. It's also essential to be aware of potential hazards, such as
                parked cars opening doors unexpectedly or uneven road surfaces, and adapt your riding accordingly.
                Finally, consider joining local cycling organizations or groups that provide resources, advice, and
                group rides, as they can offer valuable insights into cycling safely in Glasgow's specific context.
            </p>
        </div>
        <div class="w-full md:w-1/2 md:px-4">
            <img src="https://cycleglagow.yupstuff.net/images/glasgowImage.jpg" alt="Cycling in Glasgow"
                class="w-full md:w-3/4 rounded-lg mx-auto">
        </div>
    </div>

    <?php include('inludes/footer.php'); ?>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1Ijoib3dldGF5bG9yZGV2IiwiYSI6ImNsaWVwZGdtajB1MnQzZG9ieDVldWhkNXkifQ.yG8eyN4rmoXnylNWAhWUMQ';

        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v12',
            center: [-4.2518, 55.8642], // starting position for Glasgow [lng, lat]
            zoom: 11.5 // starting zoom
        });

        map.on('load', function () {
            // Define marker points and add them to the map
            const markerPoints = [

                [-4.233731, 55.849506],
                [-4.235346, 55.855207],
                [-4.268751, 55.878838],
                [-4.262494, 55.842738],
                [-4.252031, 55.859623],
                [-4.271814, 55.864745],
                [-4.241792, 55.860593],
                [-4.249879, 55.857570],
                [-4.278019, 55.871799],
                [-4.269231, 55.871320],
                [-4.294513, 55.852010],
                [-4.282754, 55.829051],
                [-4.262607, 55.817239],
                [-4.306316, 55.877033],
                [-4.264139, 55.860696]
            ];

            for (let i = 0; i < markerPoints.length; i++) {
                new mapboxgl.Marker().setLngLat(markerPoints[i]).addTo(map);
            }
            const redMarker = new mapboxgl.Marker({ color: 'red' })
                .setLngLat([-4.264349, 55.841623])
                .addTo(map);

            // Define line points
            // Line 1 
            const linePoints = [
                [[-4.205737, 55.848096],
                [-4.216348, 55.849001],
                [-4.221962, 55.849258],
                [-4.225484, 55.848972],
                [-4.231455, 55.850376],
                [-4.233088, 55.848886],
                [-4.241125, 55.855012],
                [-4.242551, 55.855684],
                [-4.243449, 55.855125],
                [-4.244685, 55.855777],
                [-4.244807, 55.855986],
                [-4.246843, 55.855928],
                [-4.250700, 55.856926],
                [-4.251678, 55.857088],
                [-4.251352, 55.857754],
                [-4.257402, 55.858408]
                ],

                [   // Line 2  
                    [-4.221879, 55.838853],
                    [-4.228623, 55.841902],
                    [-4.230844, 55.842785],
                    [-4.236262, 55.842895],
                    [-4.239220, 55.843349],
                    [-4.239509, 55.844430],
                    [-4.236955, 55.846482],
                    [-4.235939, 55.847533],
                    [-4.236951, 55.848713],
                    [-4.243965, 55.851944],
                    [-4.246744, 55.853195],
                    [-4.251196, 55.854669],
                    [-4.251537, 55.854514],
                    [-4.257329, 55.856099],
                    [-4.264604, 55.856681],
                    [-4.271158, 55.856489],
                    [-4.279064, 55.857255],
                    [-4.283791, 55.858413],
                    [-4.286904, 55.860255],
                    [-4.285814, 55.861722],
                    [-4.283450, 55.861191],
                    [-4.283253, 55.861434],
                    [-4.282596, 55.861331],
                    [-4.281060, 55.860720],
                    [-4.278880, 55.860358],
                    [-4.273338, 55.860373],
                    [-4.271709, 55.860108],
                    [-4.270764, 55.860727],
                    [-4.268991, 55.860801],
                    [-4.266220, 55.860808],
                ]
                , // Line 3
                [[-4.213409, 55.858336],
                [-4.216970, 55.858476],
                [-4.221624, 55.858353],
                [-4.224326, 55.858257],
                [-4.233795, 55.859524],
                [-4.239683, 55.860313],
                [-4.250000, 55.861563],
                [-4.248577, 55.865641],
                [-4.254022, 55.866336],
                [-4.259417, 55.867399],
                ],
                // Line 4
                [[-4.246787, 55.853170],
                [-4.249734, 55.850059],
                [-4.252876, 55.849226],
                [-4.255091, 55.845320],
                [-4.256142, 55.840851],
                [-4.257529, 55.840197],
                [-4.262983, 55.841534],
                [-4.262502, 55.842917],
                [-4.269191, 55.837026],
                [-4.273663, 55.834431],
                ],

                // Line 5
                [[-4.292547, 55.891525],
                [-4.286893, 55.893023],
                [-4.284425, 55.890202],
                [-4.282912, 55.887122],
                [-4.278974, 55.885473],
                [-4.279125, 55.884780],
                [-4.278428, 55.882493],
                [-4.274813, 55.881048],
                [-4.272431, 55.881734],
                [-4.271583, 55.882571],
                [-4.271079, 55.882739],
                [-4.268161, 55.882540],
                [-4.268118, 55.881006],
                [-4.268203, 55.879456],
                [-4.263310, 55.877001],
                [-4.259287, 55.876068],
                [-4.257817, 55.875075],
                [-4.258407, 55.873179],
                [-4.258003, 55.871491],
                [-4.260655, 55.871370],
                [-4.260655, 55.871370]
                ]
            ];

            // Line colors
            const lineColors = ['red', 'blue', 'green', 'purple', 'black'];

            // Add each line as a separate source and layer
            for (let i = 0; i < linePoints.length; i++) {
                map.addSource(`line${i}`, {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'properties': {},
                        'geometry': {
                            'type': 'LineString',
                            'coordinates': linePoints[i]
                        }
                    }
                });

                map.addLayer({
                    'id': `line${i}`,
                    'type': 'line',
                    'source': `line${i}`,
                    'layout': {},
                    'paint': {
                        'line-color': lineColors[i],
                        'line-width': 2
                    }
                });
            }
        });
    </script>

    <!--footer -->
    <?php include('includes/footer.php'); ?>






</body>