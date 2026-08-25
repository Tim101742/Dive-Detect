<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Map Cubes</title>
    <link rel="stylesheet" href="vis.css">
</head>
<body>
<div class="header">
    <a href="../Archive/pagina1.php" class="logo">&#9776;</a>
    <div class="header-right">
        <a href="#" id="arrowUp">&#8593;</a>
        <a href="#" id="arrowDown">&#8595;</a>
    </div>
</div>





<div class="container" id="container"></div>

<script>
    const itemSets = <?php
$itemSets = [
    [
        ["id"=>"Kogelvis","naam"=>"kogelvis","img"=>"images/kogelvis.png"],
        ["id"=>"Clownsvis","naam"=>"clownsvis","img"=>"images/clownfish.png"],
        ["id"=>"Doktersvis","naam"=>"doktersvis","img"=>"images/doktersvis.png"],
        ["id"=>"Papegaaivis","naam"=>"papegaaivis","img"=>"images/parrotfish.png"],
        ["id"=>"Zeeanemoon","naam"=>"zeeanemoon","img"=>"images/anemone.png"],
        ["id"=>"Garnaal","naam"=>"garnaal","img"=>"images/shrimp.png"],
        ["id"=>"Zeeduivel","naam"=>"zeeduivel","img"=>"images/angler.png"]
    ],
    [
        ["id"=>"Haai","naam"=>"haai","img"=>"images/shark.png"],
        ["id"=>"Hamerhaai","naam"=>"hamerhaai","img"=>"images/hammerhead.png"],
        ["id"=>"Tonijn","naam"=>"tonijn","img"=>"images/tuna.png"],
        ["id"=>"Zwaardvis","naam"=>"zwaardvis","img"=>"images/swordfish.png"],
        ["id"=>"Dolfijn","naam"=>"dolfijn","img"=>"images/dolphin.png"],
        ["id"=>"Rog","naam"=>"rog","img"=>"images/ray.png"],
        ["id"=>"Zeeschildpad","naam"=>"zeeschildpad","img"=>"images/turtle.png"]
    ],
    [
        ["id"=>"Octopus","naam"=>"octopus","img"=>"images/octopus.png"],
        ["id"=>"Lantaarnvis","naam"=>"lantaarnvis","img"=>"images/lanternfish.png"],
        ["id"=>"Reuzeninktvis","naam"=>"reuzeninktvis","img"=>"images/squid.png"],
        ["id"=>"Diepzee aal","naam"=>"aal","img"=>"images/eel.png"],
        ["id"=>"Blobvis","naam"=>"blobvis","img"=>"images/blobfish.png"]
    ]

];
            $clickedCubes = array_map(
                    function ($v) {
                        return strtolower(trim($v));
                    },
                    $clickedCubes
            );
            foreach ($itemSets as &$set) {
                $set = array_values(array_filter($set, function($item) use ($clickedCubes) {
                    return !in_array(strtolower($item["naam"]), $clickedCubes);
                }));
            }
            echo json_encode($itemSets);

            ?>;
</script>

<script src="vis.js?v=123"></script>
</body>
</html>