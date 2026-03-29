<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trà Sữa Tr.Phat</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

  <!-- Owl Carousel -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

  <!-- Custom CSS -->
  <link rel="stylesheet" href="index.css">
</head>

<body>


  <nav class="navbar navbar-expand-lg shadow-sm fixed-top bg-white py-3">
    <div class="container">
      <a class="navbar-brand fw-bold text-success fs-4" href="#">🧋 Trà Sữa Tr.Phat</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"><a class="nav-link active text-success fw-semibold" href="#">Trang chủ</a></li>
          <li class="nav-item"><a class="nav-link text-success fw-semibold" href="menu.php">Menu</a></li>
          <li class="nav-item"><a class="nav-link text-success fw-semibold" href="promotion.php">Khuyến mãi</a></li>
          <li class="nav-item"><a class="nav-link text-success fw-semibold" href="contact.php">Liên hệ</a></li>
        </ul>
        <div class="d-flex">
          <button class="btn btn-outline-success me-2"><i class="fa-solid fa-cart-shopping me-1"></i>Giỏ hàng <span
              id="cart-count" class="badge bg-danger ms-1" style="display: none;">0</span></button>
          <?php session_start(); ?>
          <div class="d-flex">
            <?php if (isset($_SESSION['username'])): ?>
              <span class="me-3 text-success fw-semibold">👋 Xin chào,
                <?php echo $_SESSION['username']; ?>
              </span>
              <a href="logout.php" class="btn btn-outline-danger">Đăng xuất</a>
            <?php else: ?>
              <a href="login.php" class="btn btn-success text-white"><i class="fa-solid fa-user me-1"></i> Đăng nhập</a>
            <?php endif; ?>
          </div>

        </div>
      </div>
    </div>
  </nav>


  <header class="hero-section d-flex align-items-center">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-md-6 text-center text-md-start">
          <h1 class="fw-bold display-4 text-success">Trà Sữa Tr.Phat</h1>
          <p class="lead text-muted mb-4">Hương vị ngọt ngào - Tươi mát - Đậm đà hương vị tự nhiên</p>
          <button class="btn btn-success btn-lg rounded-pill px-4">Xem thêm</button>
        </div>
        <div class="col-12 col-md-6 text-center mt-4 mt-md-0">
          <img src="hinh-nen-ly-tra-sua-cute-removebg-preview.png" alt="Trà sữa" class="img-fluid hero-img">
        </div>
      </div>
    </div>
  </header>


  <section class="py-5 bg-light">
    <div class="container-xl">
      <div class="text-center mb-5">
        <h2 class="fw-bold text-success">Danh sách sản phẩm nổi bật</h2>
        <p class="text-muted">Khám phá những món trà sữa được yêu thích nhất</p>
      </div>
      <div class="owl-carousel owl-theme">
        <div class="item"><img src="anh1.jpg" class="img-fluid rounded shadow"></div>
        <div class="item"><img src="anh2.jpg" class="img-fluid rounded shadow"></div>
        <div class="item"><img src="anh3.jpg" class="img-fluid rounded shadow"></div>
        <div class="item"><img src="anh4.jpg" class="img-fluid rounded shadow"></div>
        <div class="item"><img src="anh5.jpg" class="img-fluid rounded shadow"></div>
      </div>
    </div>
  </section>


  <section class="container my-5">
    <div class="row text-center">
      <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 rounded-4">
          <img src="sp1.jpg" class="card-img-top rounded-top-4" alt="">
          <div class="card-body">
            <h5 class="fw-bold text-success">Trà sữa truyền thống</h5>
            <p class="text-muted">Vị trà đậm đà kết hợp cùng sữa tươi béo ngậy.</p>
            <a class="btn btn-outline-success me-2"><i class="bi bi-cart3"></i> Thêm</a>
            <button class="btn btn-success">Mua ngay</button>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 rounded-4">
          <img src="sp2.jpg" class="card-img-top rounded-top-4" alt="">
          <div class="card-body">
            <h5 class="fw-bold text-success">Trà sữa trân châu</h5>
            <p class="text-muted">Kết hợp hạt trân châu đen dẻo thơm cùng vị trà sữa.</p>
            <a class="btn btn-outline-success me-2"><i class="bi bi-cart3"></i> Thêm</a>
            <button class="btn btn-success">Mua ngay</button>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 rounded-4">
          <img src="sp4.jpg" class="card-img-top rounded-top-4" alt="">
          <div class="card-body">
            <h5 class="fw-bold text-success">Trà sữa trân châu</h5>
            <p class="text-muted">Kết hợp hạt trân châu đen dẻo thơm cùng vị trà sữa.</p>
            <a class="btn btn-outline-success me-2"><i class="bi bi-cart3"></i> Thêm</a>
            <button class="btn btn-success">Mua ngay</button>
          </div>
        </div>
      </div>



      <div class="row text-center">
        <div class="col-md-4 mb-4">
          <div class="card shadow-sm border-0 rounded-4">
            <img src="sp1.jpg" class="card-img-top rounded-top-4" alt="">
            <div class="card-body">
              <h5 class="fw-bold text-success">Trà sữa truyền thống</h5>
              <p class="text-muted">Vị trà đậm đà kết hợp cùng sữa tươi béo ngậy.</p>
              <a class="btn btn-outline-success me-2"><i class="bi bi-cart3"></i> Thêm</a>
              <button class="btn btn-success">Mua ngay</button>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="card shadow-sm border-0 rounded-4">
            <img src="sp2.jpg" class="card-img-top rounded-top-4" alt="">
            <div class="card-body">
              <h5 class="fw-bold text-success">Trà sữa trân châu</h5>
              <p class="text-muted">Kết hợp hạt trân châu đen dẻo thơm cùng vị trà sữa.</p>
              <a class="btn btn-outline-success me-2"><i class="bi bi-cart3"></i> Thêm</a>
              <button class="btn btn-success">Mua ngay</button>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="card shadow-sm border-0 rounded-4">
            <img src="sp4.jpg" class="card-img-top rounded-top-4" alt="">
            <div class="card-body">
              <h5 class="fw-bold text-success">Trà sữa trân châu</h5>
              <p class="text-muted">Kết hợp hạt trân châu đen dẻo thơm cùng vị trà sữa.</p>
              <a class="btn btn-outline-success me-2"><i class="bi bi-cart3"></i> Thêm</a>
              <button class="btn btn-success">Mua ngay</button>
            </div>
          </div>
        </div>
      </div>
  </section>


  <section class="container my-5">
    <div class="row align-items-center">
      <div class="col-md-6 text-center">
        <img src="MATCHA-LATTE-new-4-removebg-preview.png" class="img-fluid" style="width:80%;">
      </div>
      <div class="col-md-6 text-start mt-4 mt-md-0">
        <h1 class="fw-bold text-success display-5">Matcha Latte <br><span class="text-muted">Giảm 50%</span></h1>
        <p class="lead text-muted">Thức uống thanh mát từ bột matcha Nhật Bản nguyên chất, mang lại cảm giác sảng khoái.
        </p>
      </div>
    </div>
  </section>


  <footer class="footer-section py-5 text-dark">
    <div class="container">
      <div class="row text-center text-md-start">
        <div class="col-md-4 mb-4">
          <h5 class="fw-bold text-success">🧋 Trà Sữa Tr.Phat</h5>
          <p class="text-muted">Thưởng thức hương vị ngọt ngào mỗi ngày — mang đến niềm vui trong từng ly trà.</p>
        </div>
        <div class="col-md-3 mb-4">
          <h6 class="fw-bold text-success">Liên kết nhanh</h6>
          <p><a href="#" class="text-muted text-decoration-none">Trang chủ</a></p>
          <p><a href="#" class="text-muted text-decoration-none">Menu</a></p>
          <p><a href="#" class="text-muted text-decoration-none">Khuyến mãi</a></p>
          <p><a href="#" class="text-muted text-decoration-none">Liên hệ</a></p>
        </div>
        <div class="col-md-5 mb-4">
          <h6 class="fw-bold text-success">Liên hệ</h6>
          <p><i class="fas fa-home me-2"></i> 123 Đường Matcha, Q1, TP.HCM</p>
          <p><i class="fas fa-envelope me-2"></i> trasua@trphat.com</p>
          <p><i class="fas fa-phone me-2"></i> +84 123 456 789</p>
        </div>
      </div>
      <hr>
      <div class="d-flex justify-content-between align-items-center flex-wrap">
        <p class="mb-0 text-muted">© 2025 Trà Sữa Tr.Phat — Hương vị ngọt ngào mỗi ngày</p>
        <div>
          <a href="#" class="text-success me-3"><i class="fab fa-facebook fa-lg"></i></a>
          <a href="#" class="text-success me-3"><i class="fab fa-instagram fa-lg"></i></a>
          <a href="#" class="text-success"><i class="fab fa-tiktok fa-lg"></i></a>
        </div>
      </div>
    </div>
  </footer>


  <script>
    $(document).ready(function () {
      $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 15,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        navText: [
          '<i class="fa-solid fa-chevron-left"></i>',
          '<i class="fa-solid fa-chevron-right"></i>'
        ],
        responsive: {
          0: { items: 1 },
          576: { items: 2 },
          768: { items: 3 },
          992: { items: 4 },
          1200: { items: 5 }
        }
      });
    });
  </script>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>


<script src="cart.js"></script>

</html>