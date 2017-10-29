//为新闻资讯导航条添加鼠标移动事件
$('ul.tabs-color').children('li').mouseover(function(){
	$(this).children('a').trigger("click");
})
//news
$('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
//bootstrap的第一个轮播图片显示
$('.carousel-inner').children("div:first-child").addClass("active");