<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/font-awesome.css"/>
<link href='https://fonts.googleapis.com/css?family=Jura:400,500,600,300&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="tooltipster/dist/css/tooltipster.bundle.min.css" />
<link rel="stylesheet" type="text/css" href="tooltipster/dist/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-light.min.css" />
<link rel="stylesheet" type="text/css" href="css/styles.css"/>

<style>
body.noscroll{
  min-height:100%;
  overflow:hidden
}

#page_loading{
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  opacity: 1;
  z-index: 9999
}

.loader{
  position: absolute;
  top: 50%;
  left: 50%;
  height: 5px;
  width: 380px;
  margin: -2px 0 0 -190px
}

.loader>div{
  animation-duration: 5s;
  animation-name: loader_width;
  background-image: linear-gradient(to right,#fff,#95a5a6,#d2322d);
  background-size: 380px 4px;
  height: 100%;
  position: relative
}

.loader>div>div{
  height: 64px;
  position: absolute;
  top: 100%;
  transform: skew(45deg);
  transform-origin: 0 0;
  width: 100%
}

@keyframes loader_width {
  0%,100%{transition-timing-function:cubic-bezier(1,0,0.65,0.85)} 0%{width:0} 100%{width:100%}
}

@-webkit-keyframes loader_width {
  0%,100%{transition-timing-function:cubic-bezier(1,0,0.65,0.85)} 0%{width:0} 100%{width:100%}
}

#page_loading.dark{
  background-color: #272727;
  color: #e5e5e5
}

#page_loading.dark a{
  color: #fff;
  border-color: #ccc
}

#page_loading.dark a: before{
  background-color: #ddd
}

#page_loading.dark .loader{
  background-color: transparent
}

#page_loading.dark .loader>div>div{
  background-image: linear-gradient(to bottom,#292929,transparent)
}

#page_loading .nojs{
  position: absolute;
  width: 300px;
  top: 50%;
  left: 50%;
  margin-left: -150px;
  margin-top: 50px;
  text-align: center;
  font: 400 18px 'Open Sans','Helvetica Neue',Helvetica,Arial,sans-serif
}

@media all and (max-width: 414px) {
  .loader{width:320px; height:4px; margin:-2px 0 0 -160px}
  .loader>div{background-size: 320px 4px}
}
@media all and (max-width: 320px) {
  .loader{width:250px; height:4px; margin:-2px 0 0 -125px}
  .loader>div{background-size: 250px 4px}
}
</style>

</head>
