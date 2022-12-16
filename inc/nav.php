<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar" class="active">
        <!-- <button type="button" id="sidebarCollapse" class="btn">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button> -->
            <div class="sidebar-header">
                <h3><a class="navbar-brand" href="index.php?url=<?=$url?>"><i class="fas fa-rocket"></i></a> The Hangar</h3>
                <strong><a class="navbar-brand" href="index.php?url=<?=$url?>"><i class="fas fa-rocket"></i></a></strong>
                
            </div>
            
            
                      <!-- LIGHT SWITCH -->
        <div id="lightSwitch-el" class="form-check form-switch">
          <label class="form-check-label" for="lightSwitch">
          <svg id="light" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
          <svg id="dark" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
  
        </label>
          <div class="clearfix"></div>
          <input class="form-check-input" type="checkbox" id="lightSwitch" />
        </div>
                


            <ul class="list-unstyled components">
                <li>
                    <a class=""  href="psi-test.php?checked=on&url=<?php echo $url ?>"> <i class="fas fa-tachometer-alt"></i> TH PSI Test tool</a>    
                </li>
                <li class="">
                    <a class="" target="_blank" href="https://developers.google.com/speed/pagespeed/insights/?url=<?php echo $url ?>"><i class="fas fa-tachometer-alt"></i> PSI</a>
                </li>
                <li>
                    <a class="" target="_blank" href="https://tools.pingdom.com/"> <i class="fas fa-tachometer-alt"></i> Pingdom</a>	
                </li>
                <li>
                    <a class="" target="_blank" href="https://gtmetrix.com?url=<?php echo $url ?>"> <i class="fas fa-tachometer-alt"></i> GT Metrix</a>
                </li>
            </ul>

            <ul class="list-unstyled components">
                <li>
                    <a class="" target="_blank" href="https://viewdns.info/reverseip/?host=<?php echo cleanURL($url) ?>" data-toggle="tooltip" data-placement="bottom" title="ViewDNS can be used to list the number of websites sharing the same server with this domain"> <i class="fas fa-eye"></i> ViewDNS info</a>
                </li>
                </li>
                <li class="">
                    <a class="" target="_blank" href="https://validator.w3.org/nu/?doc=<?php echo $url ?>"> <i class="fas fa-code"></i> Nu Html Checker</a>     
                </li>
                <li>
                    <a class="" target="_blank" href="https://rocketcdn.me/admin/website/website/?q=<?php echo $url ?>"> <i class="fas fa-code"></i>Search in RocketCDN</a>    
                </li>
            </ul>

            <ul class="list-unstyled components">
                <li class="">
                    <a class=""  href="https://cpcss.wp-rocket.me/ui?=<?php echo $url ?>"> <i class="fas fa-code"></i> CPCSS UI Test</a>       
                </li>
                <li>
                    <a class=""  href="rucss-tests.php?url=<?php echo $url ?>"> <i class="fas fa-code"></i> RUCSS Testing tool</a>
                </li>
                <li>
                    <a class=""  href="license-validator.php?url=<?php echo $url ?>" data-toggle="tooltip" data-placement="bottom" title="This tool can be used to validate a license against WP Rocket API using a combination of URL email and API Key"> <i class="fas fa-key"></i> License Validation</a>  
                </li>
            </ul>

            <ul class="list-unstyled components">
                <li class="">
                    <a class="" target="_blank" href="side-by-side.php?url=<?php echo $url ?>" data-toggle="tooltip" data-placement="bottom" title="Side-by-side visual comparation of Cached vs non-cached versions of a website"> <i class="fas fa-eye"></i> Side by Side</a>
                </li>       
            </ul>
        </nav>


        <div id="content" class="container-fluid">
<div class="grids">

