
<div class="container-fluid px-0">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="index.php">
      <i class="fas fa-rocket"></i> 
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="https://developers.google.com/speed/pagespeed/insights/?url=<?php echo $url ?>"><i class="fas fa-tachometer-alt"></i> Pagespeed</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" target="_blank" href="https://tools.pingdom.com/"> <i class="fas fa-tachometer-alt"></i> Pingdom</a>	
        </li>
        <li class="nav-item">
        <a class="nav-link" target="_blank" href="https://gtmetrix.com?url=<?php echo $url ?>"> <i class="fas fa-tachometer-alt"></i> GT Metrix</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" target="_blank" href="https://viewdns.info/reverseip/?host=<?php echo cleanURL($url) ?>" data-toggle="tooltip" data-placement="bottom" title="ViewDNS can be used to list the number of websites sharing the same server with this domain"> <i class="fas fa-eye"></i> ViewDNS info</a>
        </li>
        <li class="nav-item">
        <a class="nav-link"  href="https://cpcss.wp-rocket.me/ui?=<?php echo $url ?>"> <i class="fas fa-code"></i> CPCSS UI Test</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" target="_blank" href="https://validator.w3.org/nu/?doc=<?php echo $url ?>"> <i class="fas fa-tachometer-alt"></i> Nu Html Checker</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" target="_blank" href="https://rocketcdn.me/admin/website/website/?q=<?php echo $url ?>"> <i class="fas fa-code"></i>Search in RocketCDN</a>
        </li>
        <li class="nav-item">
        <a class="nav-link"  href="psi-test.php?url=<?php echo $url ?>"> <i class="fas fa-clock"></i> PSI Test tool</a>
        </li>
        <li class="nav-item">
        <a class="nav-link"  href="license-validator.php?url=<?php echo $url ?>" data-toggle="tooltip" data-placement="bottom" title="This tool can be used to validate a license against WP Rocket API using a combination of URL email and API Key"> <i class="fas fa-key"></i> License Validation</a>
        </li>
        <li class="nav-item">
        <a class="nav-link"  href="rucss-tests.php?url=<?php echo $url ?>"> <i class="fas fa-clock"></i> RUCSS Testing tool</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" target="_blank" href="side-by-side.php?url=<?php echo $url ?>" data-toggle="tooltip" data-placement="bottom" title="Side-by-side visual comparation of Cached vs non-cached versions of a website"> <i class="fas fa-eye"></i> Side by Side</a>
        </li>
        <li class="nav-item">
       
      <!-- LIGHT SWITCH -->
      <div class="d-flex">
        <div class="form-check form-switch ms-auto mt-3 me-3">
          <label class="form-check-label ms-3" for="lightSwitch">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="25"
              height="25"
              fill="currentColor"
              class="bi bi-brightness-high"
              viewBox="0 0 16 16"
            >
              <path
                d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"
              />
            </svg>
          </label>
          <input class="form-check-input" type="checkbox" id="lightSwitch" />
        </div>
      </div>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->



    </div>

<div class="container-fluid">
  <div class="grid">