@extends('layouts.app')
@section('content')
<div class="main-area">
    <div class="top-main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="hello">
                        <h6>All Leases!</h6>
                    </div>
                </div>
                @include('includes.sub_header')
            </div>
        </div>
    </div>
    <div class="main-map">
        <!-- <div class="main-map-img">
            <img src="../public/assets/images/map-main.png" alt="">
        </div> -->
        <div class="map-inner">
            <ul class="map-list1">
                <li>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1092 <span>17,32 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1093 <span>14,01 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1094 </p>
                        <p><span>32,03 m <sup>2</sup></span></p>
                        <p>Boutique <br> 1095 </p>
                    </a>
                </li>
                <li>
                    <img src="../public/assets/images/extra1.png" alt="">
                </li>
                <li>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1096 <span>16,83 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1097 <span>13,61 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1098 </p>
                        <p><span>30,83 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1099 <span>10,70 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1100 <span>10,70 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <div class="white-space"></div>
                </li>
                <li>
                    <a href="#" class="yellow">
                        <p>Boutique <br> 1101 <span>10,23 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="yellow">
                        <p>Boutique <br> 1102 <span>10,42 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="blue">
                        <div class="bg-img"><img src="../public/assets/images/extra2.png" alt=""></div>
                    </a>
                </li>
                <li>
                    <a href="#" class="yellow">
                        <p>Boutique <br> 1103 </p>
                        <p><span>32,20 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="yellow">
                        <p>Boutique <br> 1104 </p>
                        <p><span>37,94 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="yellow">
                        <p>Boutique <br> 1105 </p>
                        <p><span>14,37 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="green">
                        <p>Boutique <br> 1107 <span>12,44 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="green">
                        <p>Boutique <br> 1106 <span>12,44 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <div class="white-space"></div>
                </li>
                <li>
                    <a href="#" class="white">
                        <p>BRO1</p>
                    </a>
                </li>
                <li>
                    <div class="white-space"></div>
                </li>
                <li>
                    <a href="#" class="green">
                        <p>Boutique <br> 1108 <span>10,67 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="green">
                        <p>Boutique <br> 1109 <span>10,67 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="green">
                        <p>Boutique <br> 1110 </p>
                        <p><span>11,43 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="green">
                        <p>Boutique <br> 1110 </p>
                        <p><span>38,64 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="green">
                        <p>Boutique <br> 1111 </p>
                        <p><span>29,38 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="blue">
                        <div class="bg-img"><img src="../public/assets/images/extra3.png" alt=""></div>
                    </a>
                </li>
                <li>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1112 <span>19,75 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1113 <span>19,75 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <div class="white-space"></div>
                </li>
                <li>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1114 <span>17,20 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1115 <span>18,55 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1116 <span>33,01 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1117 <span>16,34 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1118 <span>17,63 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <div class="white-space"></div>
                </li>
                <li>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1119 <span>17,08 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1120 <span>18,42 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1121 <span>15,58 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1122 <span>16,81 m <sup>2</sup></span></p>
                    </a>
                </li>
            </ul>
            <ul class="map-list2">
                <li>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1048 <span>20,65 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1049 <span>15,78 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1051 <span>56,01 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1050</p>
                    </a>
                </li>
                <li>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1052 <span>20,65 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1053 <span>15,78 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1054</p>
                    </a>
                    <a href="#" class="grey">
                        <p>Boutique <br> 10555</p>
                    </a>
                </li>
                <li>
                    <div class="white-space"></div>
                </li>
                <li>
                    <img src="../public/assets/images/extra4.png" alt="">
                    <a href="#" class="grey">
                        <p><span>2,34 <sup>m2</sup></span> A3</p>
                    </a>
                    <a href="#" class="grey">
                        <p><span>2,13 <sup>m2</sup></span> A4</p>
                    </a>
                    <a href="#" class="grey">
                        <p><span>2,17 <sup>m2</sup></span> A5</p>
                    </a>
                    <a href="#" class="grey">
                        <p><span>2,28 <sup>m2</sup></span> A6</p>
                    </a>
                </li>
                <li>
                    <div class="white-space"></div>
                </li>
                <li>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1056 <span>17,15 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1057 <span>17,15 m <sup>2</sup></span></p>
                    </a>
                    <img src="../public/assets/images/extra5.png" alt="">
                </li>
                <li>
                    <a href="#" class="grey">
                        <p>A18 <span>1,35 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A17 <span>1,35 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A16 <span>1,31 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A15 <span>1,54 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A14 <span>1,54 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A13 <span>1,54 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A12 <span>1,54 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A11 <span>1,54 <sup>m2</sup></span> </p>
                    </a>
                </li>
                <li>
                    <div class="white-space"></div>
                </li>
                <li>
                    <a href="#" class="grey">
                        <p>A19 <span>2,03 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A20 <span>2,03 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A21 <span>1,97 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A22 <span>2,31 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A23 <span>2,31 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A24 <span>2,31 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A25 <span>2,31 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A26 <span>2,31 <sup>m2</sup></span> </p>
                    </a>
                </li>
                <li>
                    <a href="#" class="yellow">
                        <p>Boutique <br> 1061 <span>15,95 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="yellow">
                        <p>Boutique <br> 1060 <span>15,43 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="yellow">
                        <p>Boutique <br> 1059 <span>13,45 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="yellow">
                        <p>Boutique <br> 1058 <span>13,69 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <div class="white-space"></div>
                </li>
                <li>
                    <a href="#" class="grey">
                        <p>A36 <span>2,61 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A39 <span>2,68 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A37 <span>1,48 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A40 <span>2,55 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A38 <span>2,81 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A41 <span>2,89 <sup>m2</sup></span> </p>
                    </a>
                    <img src="../public/assets/images/extra6.png" alt="">
                </li>
                <li>
                    <div class="white-space"></div>
                </li>
                <li>
                    <a href="#" class="green">
                        <p>Boutique <br> 1062 <span>14,25 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="green">
                        <p>Boutique <br> 1063 <span>10,73 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="green">
                        <p>Boutique <br> 1064 <span>11,97 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="green">
                        <p>Boutique <br> 1065 <span>12,66 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="green">
                        <p>Boutique <br> 1069 <span>14,23 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="green">
                        <p>Boutique <br> 1068 <span>10,70 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="green">
                        <p>Boutique <br> 1067 <span>11,50 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="green">
                        <p>Boutique <br> 1066 <span>12,66 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <div class="white-space"></div>
                </li>
                <li>
                    <a href="#" class="green">
                        <p>Boutique <br> 1070 <span>10,03 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="green">
                        <p>Boutique <br> 1071 <span>7,16 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="green">
                        <p>Boutique <br> 1072 <span>8,43 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="green">
                        <p>Boutique <br> 1073 <span>9,29 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="green">
                        <p>Boutique <br> 1074 <span>11,23 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="green">
                        <p>Boutique <br> 1075 <span>8,00 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="green">
                        <p>Boutique <br> 1076 <span>9,52 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="green">
                        <p>Boutique <br> 1077 <span>10,35 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <div class="white-space"></div>
                </li>
                <li>
                    <a href="#" class="grey">
                        <p>A42 <span>6,84 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A43 <span>6,64 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A44 <span>6,64 <sup>m2</sup></span> </p>
                    </a>
                    <img src="../public/assets/images/extra6.png" alt="">
                </li>
                <li>
                    <a href="#" class="grey">
                        <p>A45 <span>6,56 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A46 <span>6,37 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A47 <span>6,37 <sup>m2</sup></span> </p>
                    </a>
                </li>
                <li>
                    <div class="white-space"></div>
                </li>
                <li>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1078 <span>14,23 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1079 <span>14,98 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1080 <span>16,04 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1081 <span>16,12 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="grey">
                        <p>A63 <span>2,03 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A62 <span>2,03 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A61 <span>1,97 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A60 <span>2,31 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A59 <span>2,28 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A58 <span>2,31 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A57 <span>2,31 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A56 <span>2,31 <sup>m2</sup></span> </p>
                    </a>
                </li>
                <li>
                    <div class="white-space"></div>
                </li>
                <li>
                    <a href="#" class="grey">
                        <p>A64 <span>1,35 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A66 <span>1,31 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A66 <span>1,54 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A67 <span>1,52 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A68 <span>1,54 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A69 <span>1,54 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A70 <span>1,54 <sup>m2</sup></span> </p>
                    </a>
                </li>
                <li>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1082 <span>18,20 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1083 <span>18,20 m <sup>2</sup></span></p>
                    </a>
                    <a href="#">
                        <img src="../public/assets/images/extra6.png" alt="">
                    </a>
                </li>
                <li>
                    <div class="white-space"></div>
                </li>
                <li>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1084 <span>14,83 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1085 <span>15,73 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1086 <span>35,87 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1087 </p>
                    </a>
                </li>
                <li>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1088 <span>13,53 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1089 <span>14,35 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1090 <span>299,99 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1081 </p>
                    </a>
                </li>
            </ul>
            <ul class="map-list3">
                <li>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1000 <span>11,21 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1006 <span>9,53 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1001 <span>23,38 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1007 <span>19,88 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1002 <span>16,80 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1008 <span>14,28 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1003 <span>16,80 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1009 <span>14,28 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1004 <span>10,00 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1010 <span>12,85 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1005 <span>4,17 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="grey">
                        <p>Boutique <br> 1011 <span>12,85 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="grey">
                        <p>A10 <span>1,71 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A9 <span>1,76 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A8 <span>1,81 <sup>m2</sup></span> </p>
                    </a>
                </li>
                <li>
                    <div class="white-space"></div>
                </li>
                <li>
                    <a href="#" class="grey">
                        <p>A27 <span>2,71 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A28 <span>2,57 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A29 <span>2,64 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A30 <span>2,72 <sup>m2</sup></span> </p>
                    </a>
                </li>
                <li>
                    <a href="#" class="yellow">
                        <p>Boutique <br> 1012 <span>18,35 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="yellow">
                        <p>Boutique <br> 1013 <span>18,60 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <img src="../public/assets/images/extra7.png" alt="">
                    <a href="#" class="grey">
                        <p>A31</p>
                    </a>
                </li>
                <li>
                    <div class="white-space"></div>
                </li>
                <li>
                    <a href="#" class="grey">
                        <p>A35 <span>1,25 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A34 <span>1,31 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A33 <span>1,31 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A32 <span>1,31 <sup>m2</sup></span> </p>
                    </a>
                    <img src="../public/assets/images/extra8.png" alt="">
                </li>
                <li>
                    <a href="#" class="yellow">
                        <p>Boutique <br> 1014 <span>16,36 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="yellow">
                        <p>Boutique <br> 1019 <span>16,33 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="yellow">
                        <p>Boutique <br> 1015 <span>20,52 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="yellow">
                        <p>Boutique <br> 1020 <span>20,48 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="yellow">
                        <p>Boutique <br> 1016 <span>15,24 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="yellow">
                        <p>Boutique <br> 1021 <span>15,21 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="green">
                        <p>Boutique <br> 1017 <span>13,06 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="green">
                        <p>Boutique <br> 1022 <span>13,04 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="green">
                        <p>Boutique <br> 1018 <span>18,61 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="green">
                        <p>Boutique <br> 1023 <span>18,58 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <div class="white-space"></div>
                </li>
                <li>
                    <a href="#" class="green">
                        <p>Boutique <br> 1024 <span>9,34 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="green">
                        <p>Boutique <br> 1029 <span>9,50 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="green">
                        <p>Boutique <br> 1025 <span>12,94 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="green">
                        <p>Boutique <br> 1030 <span>13,16 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="green">
                        <p>Boutique <br> 1026 <span>12,95 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="green">
                        <p>Boutique <br> 1031 <span>13,18 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="green">
                        <p>Boutique <br> 1027 <span>18,97 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="green">
                        <p>Boutique <br> 1032 <span>19,30 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="green">
                        <p>Boutique <br> 1028 <span>17,59 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="green">
                        <p>Boutique <br> 1033 <span>17,90 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="grey">
                        <p>A48 <span>1,46 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A49 <span>1,50 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A50 <span>1,51 <sup>m2</sup></span> </p>
                    </a>
                    <img src="../public/assets/images/extra9.png" alt="">
                </li>
                <li>
                    <div class="white-space"></div>
                </li>
                <li>
                    <img src="../public/assets/images/extra10.png" alt="">
                    <a href="#" class="grey">
                        <p>A51</p>
                    </a>
                </li>
                <li>
                    <a href="#" class="green">
                        <p>Boutique <br> 1034 <span>18,35 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="green">
                        <p>Boutique <br> 1035 <span>18,60 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="grey">
                        <p>A55 <span>2,72 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A54 <span>2,57 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A53 <span>2,64 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A52 <span>2,72 <sup>m2</sup></span> </p>
                    </a>
                </li>
                <li>
                    <div class="white-space"></div>
                </li>
                <li>
                    <a href="#" class="grey">
                        <p>A71 <span>1,81 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A72 <span>1,64 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A73 <span>1,84 <sup>m2</sup></span> </p>
                    </a>
                    <a href="#" class="grey">
                        <p>A74 <span>1,81 <sup>m2</sup></span> </p>
                    </a>
                </li>
                <li>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1036 <span>15,48 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1040 <span>16,34 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1038 <span>14,41 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1041 <span>15,21 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1038 <span>15,48 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1042 <span>16,34 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1039 <span>9,00 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1043 <span>9,50 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <div class="white-space"></div>
                </li>
                <li>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1045 <span>16,18 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1046 <span>17,08 m <sup>2</sup></span></p>
                    </a>
                </li>
                <li>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1047 <span>14,76 m <sup>2</sup></span></p>
                    </a>
                    <a href="#" class="blue">
                        <p>Boutique <br> 1047 <span>15,58 m <sup>2</sup></span></p>
                    </a>
                </li>
            </ul>
            <div class="m-bdr1"><img src="assets/images/m-bdr1.png" alt=""></div>
            <div class="m-bdr2"><img src="assets/images/m-bdr2.png" alt=""></div>
        </div>
        <div class="zoom-controls">
            <button id="zoom-in">+</button>
            <button id="zoom-out">-</button>
        </div>
    </div>


    <!-- <div class="card">
            <div class="card-header">
                <h3>Property Map</h3>
            </div>
            <div class="card-header">
                <div id="map" style="height: 500px; width: 100%;"></div>
            </div>
        </div> -->
</div>


<!-- Modal -->
<!-- <div class="modal fade" id="propertyModal" tabindex="-1" role="dialog" aria-labelledby="propertyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="propertyModalLabel">Property Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="propertyDetails"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> -->
@endsection

@push('custom_js')
{{-- <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}"></script>
    <script>
        async function initMap() {
            const map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: {
                    lat: 38.8977263,
                    lng: -77.0363089
                }
            });

            const address = "{{ $property->address }}";
            const geocodeUrl =
                `https://maps.googleapis.com/maps/api/geocode/json?address=${encodeURIComponent(address)}&key={{ env('GOOGLE_MAPS_API_KEY') }}`;

            const response = await fetch(geocodeUrl);
            const data = await response.json();

            if (data.status === 'OK') {
                const location = data.results[0].geometry.location;
                // console.log(location);
                const marker = new google.maps.Marker({
                    position: {
                        lat: location.lat,
                        lng: location.lng
                    },
                    map: map,
                    title: '{{ $property->name }}'
                });

                marker.addListener('click', function() {
                    $.ajax({
                        url: '/map/property/' + {{ $property->id }},
                        method: 'GET',
                        success: function(response) {
                            console.log(response.address);
                            $('#propertyModalLabel').text(response.property_name);
                            $('#propertyDetails').html('<p>' + response.address + '</p>');
                            $('#propertyModal').modal('show');
                        }
                    });
                });
            }
        }

        $(document).ready(function() {
            initMap();
        });
    </script> --}}
@endpush