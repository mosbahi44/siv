<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="#">Messages</a></li>
            </ul>

        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <?php echo validation_errors('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">×</a>','</div>'); ?>
            <div class="panel">
                <div class="panel-content">
                    <?php
                    echo form_open();  ?>
                    <div class="form-group">
                        <?php

                        echo form_label('Type');
                        echo form_dropdown('type',array('0'=>'Broadcasting', '1'=>'Monocasting'),0, array('class'=>'form-control'));
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo '<div class="to-hide">';
                        echo form_label('Shelter');
                        echo '<select name="id_shelter" class="form-control">';
                        if($shelters):
                            foreach ($shelters as $shelter):
                                echo '<option value="'.$shelter->id.'">'.$shelter->name.'</option>';
                            endforeach;
                        endif;
                        echo '</select>';
                        echo '</div>';
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Message');
                        echo form_input('message', set_value('message'), array('class'=>'form-control'));
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Color');

                        $colors  =array(


                            "800000"=> "Maroon",

                            "8B0000"=> "DarkRed",

                            "B22222"=> "FireBrick",

                            "FF0000"=> "Red",

                            "FA8072"=> "Salmon",

                            "FF6347"=> "Tomato",

                            "FF7F50"=> "Coral",

                            "FF4500"=> "OrangeRed",

                            "D2691E"=> "Chocolate",

                            "F4A460"=> "SandyBrown",

                            "FF8C00"=> "DarkOrange",

                            "FFA500"=> "Orange",

                            "B8860B"=> "DarkGoldenrod",

                            "DAA520"=> "Goldenrod",

                            "FFD700"=> "Gold",

                            "808000"=> "Olive",

                            "FFFF00"=> "Yellow",

                            "9ACD32"=> "YellowGreen",

                            "ADFF2F"=> "GreenYellow",

                            "7FFF00"=> "Chartreuse",

                            "7CFC00"=> "LawnGreen",

                            "008000"=> "Green",

                            "00FF00"=> "Lime",

                            "32CD32"=> "LimeGreen",

                            "00FF7F"=> "SpringGreen",

                            "00FA9A"=> "MediumSpringGreen",

                            "40E0D0"=> "Turquoise",

                            "20B2AA"=> "LightSeaGreen",

                            "48D1CC"=> "MediumTurquoise",

                            "008080"=> "Teal",

                            "008B8B"=> "DarkCyan",

                            "00FFFF"=> "Aqua",

                            "00FFFF"=> "Cyan",

                            "00CED1"=> "DarkTurquoise",

                            "00BFFF"=> "DeepSkyBlue",

                            "1E90FF"=> "DodgerBlue",

                            "4169E1"=> "RoyalBlue",

                            "000080"=> "Navy",

                            "00008B"=> "DarkBlue",

                            "0000CD"=> "MediumBlue",

                            "0000FF"=> "Blue",

                            "8A2BE2"=> "BlueViolet",

                            "9932CC"=> "DarkOrchid",

                            "9400D3"=> "DarkViolet",

                            "800080"=> "Purple",

                            "8B008B"=> "DarkMagenta",

                            "FF00FF"=> "Fuchsia",

                            "FF00FF"=> "Magenta",

                            "C71585"=> "MediumVioletRed",

                            "FF1493"=> "DeepPink",

                            "FF69B4"=> "HotPink",

                            "DC143C"=> "Crimson",

                            "A52A2A"=> "Brown",

                            "CD5C5C"=> "IndianRed",

                            "BC8F8F"=> "RosyBrown",

                            "F08080"=> "LightCoral",

                            "FFFAFA"=> "Snow",

                            "FFE4E1"=> "MistyRose",

                            "E9967A"=> "DarkSalmon",

                            "FFA07A"=> "LightSalmon",

                            "A0522D"=> "Sienna",

                            "FFF5EE"=> "SeaShell",

                            "8B4513"=> "SaddleBrown",

                            "FFDAB9"=> "Peachpuff",

                            "CD853F"=> "Peru",

                            "FAF0E6"=> "Linen",

                            "FFE4C4"=> "Bisque",

                            "DEB887"=> "Burlywood",

                            "D2B48C"=> "Tan",

                            "FAEBD7"=> "AntiqueWhite",

                            "FFDEAD"=> "NavajoWhite",

                            "FFEBCD"=> "BlanchedAlmond",

                            "FFEFD5"=> "PapayaWhip",

                            "FFE4B5"=> "Moccasin",

                            "F5DEB3"=> "Wheat",

                            "FDF5E6"=> "Oldlace",

                            "FFFAF0"=> "FloralWhite",

                            "FFF8DC"=> "Cornsilk",

                            "F0E68C"=> "Khaki",

                            "FFFACD"=> "LemonChiffon",

                            "EEE8AA"=> "PaleGoldenrod",

                            "BDB76B"=> "DarkKhaki",

                            "F5F5DC"=> "Beige",

                            "FAFAD2"=> "LightGoldenrodYellow",

                            "FFFFE0"=> "LightYellow",

                            "FFFFF0"=> "Ivory",

                            "6B8E23"=> "OliveDrab",

                            "556B2F"=> "DarkOliveGreen",

                            "8FBC8F"=> "DarkSeaGreen",

                            "006400"=> "DarkGreen",

                            "228B22"=> "ForestGreen",

                            "90EE90"=> "LightGreen",

                            "98FB98"=> "PaleGreen",

                            "F0FFF0"=> "Honeydew",

                            "2E8B57"=> "SeaGreen",

                            "3CB371"=> "MediumSeaGreen",

                            "F5FFFA"=> "Mintcream",

                            "66CDAA"=> "MediumAquamarine",

                            "7FFFD4"=> "Aquamarine",

                            "2F4F4F"=> "DarkSlateGray",

                            "AFEEEE"=> "PaleTurquoise",

                            "E0FFFF"=> "LightCyan",

                            "F0FFFF"=> "Azure",

                            "5F9EA0"=> "CadetBlue",

                            "B0E0E6"=> "PowderBlue",

                            "ADD8E6"=> "LightBlue",

                            "87CEEB"=> "SkyBlue",

                            "87CEFA"=> "LightskyBlue",

                            "4682B4"=> "SteelBlue",

                            "F0F8FF"=> "AliceBlue",

                            "708090"=> "SlateGray",

                            "778899"=> "LightSlateGray",

                            "B0C4DE"=> "LightsteelBlue",

                            "6495ED"=> "CornflowerBlue",

                            "E6E6FA"=> "Lavender",

                            "F8F8FF"=> "GhostWhite",

                            "191970"=> "MidnightBlue",

                            "6A5ACD"=> "SlateBlue",

                            "483D8B"=> "DarkSlateBlue",

                            "7B68EE"=> "MediumSlateBlue",

                            "9370DB"=> "MediumPurple",

                            "4B0082"=> "Indigo",

                            "BA55D3"=> "MediumOrchid",

                            "DDA0DD"=> "Plum",

                            "EE82EE"=> "Violet",

                            "D8BFD8"=> "Thistle",

                            "DA70D6"=> "Orchid",

                            "FFF0F5"=> "LavenderBlush",

                            "DB7093"=> "PaleVioletRed",

                            "FFC0CB"=> "Pink",

                            "FFB6C1"=> "LightPink",

                            "000000"=> "Black",

                            "696969"=> "DimGray",

                            "808080"=> "Gray",

                            "A9A9A9"=> "DarkGray",

                            "C0C0C0"=> "Silver",

                            "D3D3D3"=> "LightGrey",

                            "DCDCDC"=> "Gainsboro",

                            "F5F5F5"=> "WhiteSmoke",

                            "FFFFFF"=> "White"

                        );



                        ?>
                        <select name="color" class="form-control">
                            <?php
                            foreach($colors as $key => $value):
                                ?>
                                <option value="#<?= $key;?>" style="color:#fff; background-color:#<?=$key;?> "><?= $value;?></option>
                                <?php
                            endforeach;
                            ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Background');
                        ?>
                        <select name="background" class="form-control">
                            <?php
                            foreach($colors as $key => $value):
                                ?>
                                <option value="#<?= $key;?>" style="color:#fff; background-color:#<?=$key;?> "><?= $value;?></option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_submit('submit', 'Save', array('class'=>'btn btn-primary'));
                        ?>
                    </div>
                    <?php

                    echo form_close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
