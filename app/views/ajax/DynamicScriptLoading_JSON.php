<?php 
header("Content-type: text/javascript"); 
 
echo 'var oSoftwares = {
        "Adobe": [
                "Acrobat",
                "InDesign",
                "Photoshop"
        ],
        "Macromedia": [
                "Dreamweaver",
                "Flash",
                "FreeHand"
        ],
        "Microsoft": [
                "Office",
                "Visual C++",
                "WMedia Player"
        ] 
};';
 
echo $_GET['callback'] ?>(oSoftwares);