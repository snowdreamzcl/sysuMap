var choosedClass = "none"; //类别的图片的id
var choosedPlace = "none"; //按钮的id
var mapType = "book";
//实现显示全部的效果
function showAllPlace() {
  clearPlace();

  var btn = document.getElementsByClassName(choosedClass);
  var index = choosedClass + "Index";
  var allPlace = document.getElementsByClassName(index);

  for (var i = 0; i < btn.length; i++) {
    btn[i].style.opacity = "0.6";
    btn[i].style.cursor = "not-allowed";
    allPlace[i].style.display = "block";
  }

  var allBtn = document.getElementById("all");
  allBtn.innerHTML = "隐藏全部";
}
//实现隐藏全部的效果
function releaseAllPlace() {
  var btn = document.getElementsByClassName(choosedClass);
  var index = choosedClass + "Index";
  var allPlace = document.getElementsByClassName(index);
  for (var i = 0; i < btn.length; i++) {
    btn[i].style.opacity = "1";
    btn[i].style.cursor = "pointer";

    allPlace[i].style.display = "none";
  }
  var allBtn = document.getElementById("all");
  allBtn.innerHTML = "显示全部";
}

function clickAllBtn(element) {
  if (element.innerHTML == "显示全部") {
    showAllPlace();
  } else {
    releaseAllPlace();
  }
}

function clearBtn() {
  if (choosedClass == "none") return;
  var btn = document.getElementsByClassName(choosedClass);
  for (var i = 0; i < btn.length; i++) btn[i].style.display = "none";
  document.getElementById(choosedClass).style.opacity = "1.0";
  choosedClass = "none";
}
function clearPlace() {
  if (choosedPlace == "none") return;
  var index = choosedPlace + "Index";
  document.getElementById(index).style.display = "none";
  document.getElementById(choosedPlace).style.opacity = "1";
  document.getElementById(choosedPlace).style.cursor = "pointer";
  choosedPlace = "none";
}
function select(element) {
  if (document.getElementById("all").innerHTML == "隐藏全部") {
    releaseAllPlace();
  }
  clearPlace();
  clearBtn();
  element.style.opacity = "0.5";
  choosedClass = element.id;
  var btn = document.getElementsByClassName(choosedClass);
  for (var i = 0; i < btn.length; i++) btn[i].style.display = "inline";
  document.getElementById("all").style.display = "inline";
  hiddenNavigation();
}
function leftPosition() {
  element.style.left = "-95%";
}
function hiddenNavigation() {
  var leftElement = document.getElementById("hideNavigation");
  leftElement.style.display = "none";
  var rightElement = document.getElementById("expendNavigation");
  rightElement.style.display = "block";
  if (mapType == "book")
    document.getElementById("baiduMapButton").style.display = "block";
  else document.getElementById("bookMapButton").style.display = "block";

  var element = document.getElementById("navigation");
  element.style.left = "0";
  element.style.animation = "leftMove 3s 100ms 1 forwards";
  showMarker();
}

function expendNavigation() {
  var leftElement = document.getElementById("hideNavigation");
  leftElement.style.display = "block";
  var rightElement = document.getElementById("expendNavigation");
  rightElement.style.display = "none";
  if (mapType == "book")
    document.getElementById("baiduMapButton").style.display = "none";
  else document.getElementById("bookMapButton").style.display = "none";

  var element = document.getElementById("navigation");
  element.style.left = "-95%";
  element.style.animation = "rightMove 3s 100ms 1 forwards";
  hideMarker();
}
function showMarker() {
  mp.centerAndZoom(centerPoint, 16);
  var markerIndex = classType.indexOf(choosedClass);
  var marker = markers[markerIndex];

  for (var i = 0; i < marker.length; i++) mp.addOverlay(marker[i]);
}
function hideMarker() {
  var markerIndex = classType.indexOf(choosedClass);
  var marker = markers[markerIndex];
  for (var i = 0; i < marker.length; i++) mp.removeOverlay(marker[i]);
}
function showBaiduMap() {
  mapType = "baidu";
  document.getElementById("map").style.display = "none";
  document.getElementById("buttonBox").style.display = "none";
  document.getElementById("baiduMapButton").style.display = "none";
  document.getElementById("bookMapButton").style.display = "block";
  document.getElementById("baiduMap").style.zIndex = "3";

  hideLocation();
  document.getElementById("showLocation").style.display = "block";
}
function showBookMap() {
  mapType = "book";
  document.getElementById("bookMapButton").style.display = "none";
  document.getElementById("baiduMap").style.zIndex = "-1";
  document.getElementById("map").style.display = "block";
  document.getElementById("buttonBox").style.display = "block";
  document.getElementById("baiduMapButton").style.display = "block";

  document.getElementById("showLocation").style.display = "none";
  document.getElementById("hideLocation").style.display = "none";
}
function showPlace(element) {
  if (choosedPlace != "none") clearPlace();
  element.style.opacity = "0.6";
  element.style.cursor = "not-allowed";
  choosedPlace = element.id;
  var index = element.id + "Index";
  document.getElementById(index).style.display = "block";
}

function showLocation() {
  var geolocation = new BMap.Geolocation();
  geolocation.getCurrentPosition(
    function(r) {
      if (this.getStatus() == BMAP_STATUS_SUCCESS) {
        userPosition = r.point;
        userMarker[0] = new BMap.Marker(userPosition, {
          // 指定Marker的icon属性为Symbol
          icon: new BMap.Symbol(BMap_Symbol_SHAPE_CIRCLE, {
            scale: 5, //图标缩放大小
            fillColor: "rgb(50, 125,255)", //填充颜色
            fillOpacity: 1, //填充透明度
            strokeColor: "rgb(50, 125,255)",
            strokeWeight: 1,
            strokeOpacity: 1
          })
        });
        mp.addOverlay(userMarker[0]);
        userMarker[1] = new BMap.Circle(userPosition, 200, {
          fillColor: "rgb(24, 125,255)",
          fillOpacity: "0.1",
          strokeColor: "rgb(24, 125,255)",
          strokeWeight: 1,
          strokeOpacity: 0.5
        }); //创建圆
        mp.addOverlay(userMarker[1]);
        //alert('您的位置：' + userPosition.lng + ',' + userPosition.lat);
      }
    },
    { enableHighAccuracy: true }
  );
  document.getElementById("showLocation").style.display = "none";
  document.getElementById("hideLocation").style.display = "block";
}

function hideLocation() {
  mp.removeOverlay(userMarker[0]);
  mp.removeOverlay(userMarker[1]);
  document.getElementById("showLocation").style.display = "block";
  document.getElementById("hideLocation").style.display = "none";
}

//获取css样式的属性值，返回值为string类型。
function getDefaultStyle(obj, attribute) {
  // 返回最终样式函数，兼容IE和DOM，设置参数：元素对象、样式特性
  return obj.currentStyle
    ? obj.currentStyle[attribute]
    : document.defaultView.getComputedStyle(obj, false)[attribute];
}

//计算所有点坐标图片左上角的坐标，并更新left和top。
window.onload = function() {
  var position = document.getElementsByClassName("place");
  for (var i = 0; i < position.length; i++) {
    //获取控件的宽高
    var width = position[i].scrollWidth;
    var height = position[i].scrollHeight;

    //计算新的左上角位置坐标，并加上单位，转为string类型
    var x = parseFloat(getDefaultStyle(position[i], "left")) - width / 2;
    var y = parseFloat(getDefaultStyle(position[i], "top")) - height;
    x = String(x) + "px";
    y = String(y) + "px";

    //设置新的左上角坐标
    position[i].style.left = x;
    position[i].style.top = y;

    //将空间隐藏起来。
    position[i].style.display = "none";
  }
  loadScript();
};
