var mp;
var classType;
var markers;
var centerPoint;
var userPosition;
var userMarker;

function addText(m, c) {
  var p = m.getPosition();
  var infoWindow = new BMap.InfoWindow(c); // 创建信息窗口对象
  m.addEventListener("click", attribute);
  function attribute() {
    mp.openInfoWindow(infoWindow, p); //开启信息窗口
  }
}

function addUrl(m, url) {
  m.addEventListener("click", attribute);
  function attribute() {
    window.open(url,'_blank');  
  }
}

function initialize() {
  userMarker = new Array();
  classType = new Array(
    "study",
    "eat",
    "residence",
    "office",
    "sport",
    "tour",
    "use",
    "traffic"
  );
  centerPoint = new BMap.Point(113.398989,23.070536);
  mp = new BMap.Map("baiduMap");
  mp.centerAndZoom(centerPoint, 16);
  mp.enableScrollWheelZoom(true);
  mp.addControl(new BMap.MapTypeControl({ anchor: BMAP_ANCHOR_TOP_LEFT })); //左上角，3D
  mp.setCurrentCity("广州"); //由于有3D图，需要设置城市哦
  //标注线数组
  var plPoints = [
    {
      style: "solid",
      weight: 4,
      color: "#f00",
      opacity: 0.6,
      points: [
        "113.39487|23.068101",
        "113.394098|23.068683",
        "113.393586|23.068442",
        "113.393586|23.06845",
        "113.393092|23.068342",
        "113.392795|23.068408",
        "113.392499|23.068541",
        "113.391807|23.069157",
        "113.391475|23.069647",
        "113.39134|23.070162",
        "113.391394|23.070819",
        "113.391807|23.071625",
        "113.392184|23.072274",
        "113.392508|23.072814",
        "113.393056|23.073628",
        "113.393747|23.074393",
        "113.394897|23.075166",
        "113.395751|23.075366",
        "113.39655|23.075549",
        "113.397125|23.075881",
        "113.398041|23.07623",
        "113.39858|23.076272",
        "113.399227|23.07623",
        "113.400269|23.075964",
        "113.400494|23.075864",
        "113.400835|23.075773",
        "113.400808|23.075864",
        "113.400907|23.076139",
        "113.40106|23.076355",
        "113.401329|23.07638",
        "113.401616|23.076779",
        "113.402111|23.076571",
        "113.402075|23.076588",
        "113.401904|23.076662",
        "113.402075|23.076579"
      ]
    }
  ];

  markers = new Array();
  markers[0] = new Array();
  markers[0][0] = new BMap.Marker(new BMap.Point(113.399618,23.074692)); //公教楼
  markers[0][1] = new BMap.Marker(new BMap.Point(113.398378,23.073013)); //图书馆
  markers[0][2] = new BMap.Marker(new BMap.Point(113.397534,23.066181)); //新学生活动中心
  markers[0][3] = new BMap.Marker(new BMap.Point(113.394318,23.071185)); //南实验楼
  markers[0][4] = new BMap.Marker(new BMap.Point(113.39333,23.072299)); //北实验楼
  addUrl(markers[0][0], "../publicEducation.html");
  addUrl(markers[0][1], "../library.html");
  addUrl(markers[0][2], "../newActivity.html");
  addText(markers[0][3], "南实验楼");
  addText(markers[0][4], "北实验楼");

  markers[1] = new Array();
  markers[1][0] = new BMap.Marker(new BMap.Point(113.397013,23.066846)); //一饭
  markers[1][1] = new BMap.Marker(new BMap.Point(113.397588,23.067245)); //二饭
  markers[1][2] = new BMap.Marker(new BMap.Point(113.39739,23.066064)); //四饭
  markers[1][3] = new BMap.Marker(new BMap.Point(113.397659,23.065782)); //清真饭堂
  markers[1][4] = new BMap.Marker(new BMap.Point(113.39748,23.074659)); //行政餐厅
  addUrl(markers[1][0], "../firstRestaurant.html");
  addUrl(markers[1][1], "../secondRestaurant.html");
  addUrl(markers[1][2], "../fourthRestaurant.html");
  addText(markers[1][3], "清真饭堂");
  addUrl(markers[1][4], "../administrativeRestaurant.html");

  markers[2] = new Array();
  markers[2][0] = new BMap.Marker(new BMap.Point(113.397174,23.064468)); //慎思园
  markers[2][1] = new BMap.Marker(new BMap.Point(113.397282,23.068275)); //明德园
  markers[2][2] = new BMap.Marker(new BMap.Point(113.398917,23.0652)); //至善园
  markers[2][3] = new BMap.Marker(new BMap.Point(113.394803,23.066812)); //格致园
  addText(markers[2][0], "慎思园");
  addText(markers[2][1], "明德园");
  addText(markers[2][2], "至善园");
  addText(markers[2][3], "格致园");

  markers[3] = new Array();
  markers[3][0] = new BMap.Marker(new BMap.Point(113.397606,23.075191)); // 行政楼
  markers[3][1] = new BMap.Marker(new BMap.Point(113.399905,23.077818)); // 数据学院
  addUrl(markers[3][0], "../administrativeBuilding.html");
  addUrl(markers[3][1], "http://sdcs.sysu.edu.cn/");

  markers[4] = new Array();
  markers[4][0] = new BMap.Marker(new BMap.Point(113.398324,23.071534)); //体育馆
  markers[4][1] = new BMap.Marker(new BMap.Point(113.396384,23.071517)); //游泳馆
  markers[4][2] = new BMap.Marker(new BMap.Point(113.400211,23.071767)); //真草
  markers[4][3] = new BMap.Marker(new BMap.Point(113.395252,23.070171)); //假草
  addUrl(markers[4][0], "../gym.html");
  addText(markers[4][1], "游泳馆");
  addText(markers[4][2], "真草");
  addText(markers[4][3], "假草");

  markers[5] = new Array();
  markers[5][0] = new BMap.Marker(new BMap.Point(113.39412,23.071767)); // 谷河
  markers[5][1] = new BMap.Marker(new BMap.Point(113.398378,23.07707)); // 牌坊
  markers[5][2] = new BMap.Marker(new BMap.Point(113.398324,23.075856)); //孙中山铜像
  addText(markers[5][0], "谷河");
  addText(markers[5][1], "牌坊");
  addText(markers[5][2], "孙中山铜像");

  markers[6] = new Array();
  markers[6][0] = new BMap.Marker(new BMap.Point(113.396384,23.068608)); // 校医院
  markers[6][1] = new BMap.Marker(new BMap.Point(113.395647,23.068159)); // 明六
  addUrl(markers[6][0], "../hospital.html");
  addUrl(markers[6][1], "../serverCenter.html");
  

  markers[7] = new Array();
  //向地图中添加线函数
  for (var i = 0; i < plPoints.length; i++) {
    var json = plPoints[i];
    var points = [];
    for (var j = 0; j < json.points.length; j++) {
      var p1 = json.points[j].split("|")[0];
      var p2 = json.points[j].split("|")[1];
      points.push(new BMap.Point(p1, p2));
    }
    markers[7][i] = new BMap.Polyline(points, {
      strokeStyle: json.style,
      strokeWeight: json.weight,
      strokeColor: json.color,
      strokeOpacity: json.opacity
    });
  }
  markers[7][plPoints.length + 3] = new BMap.Marker(
    new BMap.Point(113.395072, 23.067802)
  ); // 创建校医院标注
  markers[7][plPoints.length + 2] = new BMap.Marker(
    new BMap.Point(113.394551, 23.074867)
  ); // 创建明六标注
  markers[7][plPoints.length + 1] = new BMap.Marker(
    new BMap.Point(113.399438, 23.07618)
  ); // 创建明六标注
  markers[7][plPoints.length] = new BMap.Marker(
    new BMap.Point(113.402061, 23.076546)
  ); // 创建明六标注
  addText(markers[7][plPoints.length], "生科院停车场西侧（起点）");
  addText(markers[7][plPoints.length + 1], "教学楼A座北侧（候车点）");
  addText(markers[7][plPoints.length + 2], "北学院楼（北望路岗亭）（候车点）");
  addText(markers[7][plPoints.length + 3], "岐关车站（候车点）");
  /*
  for (var i = 0; i < markers.length; i++) {
    for (var j = 0; j < markers[i].length; j++) {
      mp.addOverlay(markers[i][j]);
    }
  }
  */
}

function loadScript() {
  var script = document.createElement("script");
  script.src =
    "http://api.map.baidu.com/api?v=3.0&ak=gfdlktI6VznVTKwSAsVqW3gslgd0ajrp&callback=initialize";
  document.body.appendChild(script);
}
