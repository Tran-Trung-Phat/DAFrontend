export function addToCart(product, quantity =1){
  // lấy giỏ hàng từ localStorage
  let cart = JSON.parse(localStorage.getItem('cart')) || [];

  //kiểm tra sản phẩm đã tồn tại chưa
  const index = cart.findIndex(item => item.id ===product.id);

  if (index !== -1){
    //nếu đã tồn tại thì tăng số lượng
    cart[index].quantity += quantity;

  }else{
    //nếu chưa tồn tại thêm sản phẩm vào giỏ hàng
    cart.push({
      ...product,
      quantity: quantity,

    });
  }
  //lưu giỏ hàng vào localStorage
  localStorage.setItem('cart',JSON.stringify(cart));
  
  updateCartCount();
}

export function updateCartCount() {
  const cart = JSON.parse(localStorage.getItem('cart')) || [];
  // Tính tổng số lượng của tất cả sản phẩm
  const totalQuantity = cart.reduce((sum, item) => sum + item.quantity, 0);
  
  // Hỗ trợ cả 2 ID tùy theo trang HTML thiết lập
  const badge = document.getElementById('cart-count') || document.getElementById('cart-badge');
  if (badge) {
    badge.textContent = totalQuantity;
    badge.style.display = totalQuantity > 0 ? 'inline-block' : 'none';
  }
}

export function removeFromCart(productId) {
  let cart = getCart();
  cart = cart.filter(item => item.id !== productId);
  localStorage.setItem('cart', JSON.stringify(cart));
  // Cập nhật lại giao diện ngay sau khi xóa
  renderCart();
}

function getCart() {
  return JSON.parse(localStorage.getItem("cart")) || [];
}

function renderCart() {
  const cart = getCart();
  const cartContainer = document.getElementById("cart-container");

  if (!cartContainer) return; // Thoát nếu không ở trang giỏ hàng

  if (cart.length === 0) {
    cartContainer.innerHTML = `
      <div class="col-12 text-center py-5">
        <i class="bi bi-cart-x text-muted" style="font-size: 5rem;"></i>
        <h4 class="mt-4 text-muted">Giỏ hàng của bạn đang trống</h4>
        <p class="text-muted">Có vẻ như bạn chưa thêm sản phẩm nào vào giỏ hàng.</p>
        <a href="index6.html" class="btn btn-dark mt-3 px-4 rounded-pill">Tiếp tục mua sắm</a>
      </div>
    `;
    updateCartCount();
    return;
  }

  let itemsHtml = '<div class="col-lg-8"><div class="card border-0 shadow-sm mb-4"><div class="card-body p-0">';
  
  cart.forEach(item => {
    itemsHtml += `
      <div class="row align-items-center border-bottom p-3 m-0">
        <div class="col-3 col-md-2 text-center">
          <img src="${item.image}" class="img-fluid rounded object-fit-cover" style="max-height: 80px;" alt="${item.name}">
        </div>
        <div class="col-9 col-md-4 mb-3 mb-md-0">
          <h6 class="fw-bold mb-1">${item.name}</h6>
          <p class="text-danger mb-0">${item.price.toLocaleString('vi-VN')} ${item.currency}</p>
        </div>
        <div class="col-6 col-md-3">
          <div class="input-group input-group-sm w-100" style="max-width: 120px; margin: 0 auto;">
            <button class="btn btn-outline-secondary decrease-btn" data-id="${item.id}">-</button>
            <input type="text" class="form-control text-center bg-white" value="${item.quantity}" readonly>
            <button class="btn btn-outline-secondary increase-btn" data-id="${item.id}">+</button>
          </div>
        </div>
        <div class="col-4 col-md-2 text-end fw-bold text-danger">
          ${(item.price * item.quantity).toLocaleString('vi-VN')} ${item.currency}
        </div>
        <div class="col-2 col-md-1 text-end">
          <button class="btn btn-sm btn-outline-danger remove-item-btn border-0" data-id="${item.id}" title="Xóa">
            <i class="bi bi-trash3 fs-5"></i>
          </button>
        </div>
      </div>
    `;
  });
  
  itemsHtml += '</div></div></div>';

  const totalPrice = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);

  let summaryHtml = `
    <div class="col-lg-4">
      <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
          <h5 class="fw-bold mb-4">Tóm tắt đơn hàng</h5>
          <div class="d-flex justify-content-between mb-3">
            <span class="text-muted">Tổng phụ</span>
            <span class="fw-bold">${totalPrice.toLocaleString('vi-VN')} ${cart[0]?.currency || '$'}</span>
          </div>
          <div class="d-flex justify-content-between mb-3">
            <span class="text-muted">Phí giao hàng</span>
            <span class="fw-bold text-success">Miễn phí</span>
          </div>
          <hr>
          <div class="d-flex justify-content-between mb-4">
            <span class="fw-bold fs-5">Tổng cộng</span>
            <span class="fw-bold fs-5 text-danger">${totalPrice.toLocaleString('vi-VN')} ${cart[0]?.currency || '$'}</span>
          </div>
          <button id="checkout-btn" class="btn btn-dark w-100 py-3 rounded-pill fw-bold fs-6 shadow-sm">
            Thanh toán ngay <i class="bi bi-arrow-right ms-2"></i>
          </button>
          <a href="index6.html" class="btn btn-outline-secondary w-100 py-2 rounded-pill mt-3">Tiếp tục mua sắm</a>
        </div>
      </div>
    </div>
  `;

  cartContainer.innerHTML = itemsHtml + summaryHtml;

  // Gắn sự kiện cho các nút bấm + / - / Xóa / Thanh toán
  attachCartEvents();
  
  // Cập nhật số lượng giỏ hàng trên Navbar
  updateCartCount();
}

function attachCartEvents() {
  document.querySelectorAll('.remove-item-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
      const id = parseInt(e.currentTarget.closest('button').getAttribute('data-id'));
      removeFromCart(id);
    });
  });

  document.querySelectorAll('.increase-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
      const id = parseInt(e.currentTarget.getAttribute('data-id'));
      updateQuantity(id, 1);
    });
  });

  document.querySelectorAll('.decrease-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
      const id = parseInt(e.currentTarget.getAttribute('data-id'));
      updateQuantity(id, -1);
    });
  });

  const checkoutBtn = document.getElementById('checkout-btn');
  if (checkoutBtn) {
    checkoutBtn.addEventListener('click', () => {
      alert('Thanh toán thành công! Cảm ơn bạn đã mua sắm tại PRAGUE.');
      localStorage.removeItem('cart'); // Xóa giỏ hàng sau khi thanh toán
      renderCart(); // Cập nhật lại giao diện ngay lập tức
    });
  }
}

function updateQuantity(productId, change) {
  let cart = getCart();
  const index = cart.findIndex(item => item.id === productId);
  if (index !== -1) {
    cart[index].quantity += change;
    // Nếu giảm về 0 hoặc âm thì tự động xóa sản phẩm đó
    if (cart[index].quantity <= 0) {
      cart = cart.filter(item => item.id !== productId);
    }
    localStorage.setItem('cart', JSON.stringify(cart));
    renderCart(); // Load lại giao diện sau khi điều chỉnh
  }
}

document.addEventListener('DOMContentLoaded', () => {
  renderCart();
  updateCartCount(); // Khởi tạo con số giỏ hàng ngay khi tải trang
});