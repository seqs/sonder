<nav class="bar bar-tab">
  <a class="tab-item<%= activePath('/portal#/') %>" href="#/">
    <span class="icon icon-home"></span>
    <span class="tab-label">首页</span>
  </a>
  <a class="tab-item" href="#">
    <span class="icon icon-star-filled"></span>
    <span class="tab-label">已售票</span>
  </a>
  <a class="tab-item" href="#">
    <span class="icon icon-search"></span>
    <span class="tab-label">搜索</span>
  </a>
  <a class="tab-item<%= activePath('/portal#/login') %>" href="#/login">
    <span class="icon icon-person"></span>
    <span class="tab-label">个人资料</span>
  </a>
  <a class="tab-item" href="#">
    <span class="icon icon-gear"></span>
    <span class="tab-label">设置</span>
  </a>
</nav>

<div id="content">
    <div class="screen-loader" style="display:none;"><img src="/assets/img/loader-large-grey.gif" alt="Loading" /></div>    
</div> <!-- /content -->
