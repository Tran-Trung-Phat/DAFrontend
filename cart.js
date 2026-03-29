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
}

export function removeFromCart(productId) {
  let cart = getCart();
  cart = cart.filter(item => item.id !== productId);
  localStorage.setItem('cart', JSON.stringify(cart));
}

function getCart() {
  return JSON.parse(localStorage.getItem("cart")) || [];
}

function renderCart() {
  const cart = getCart();
  const cartList = document.getElementById("cart-list");

  if (!cartList) return; // Thoát khỏi hàm nếu không tìm thấy id cart-list để tránh lỗi

  if (cart.length === 0) {
    cartList.innerHTML = "<p>Giỏ hàng trống</p>";
    return;
  }

  cartList.innerHTML = cart.map(item => `
    <div style="border:1px solid #ccc; margin:10px; padding:10px">
      <img src="${item.image}" width="100"/>
      <h3>${item.name}</h3>
      <p>Giá: ${item.price.toLocaleString('vi-VN')} ${item.currency}</p>
      <p>Số lượng: ${item.quantity}</p>
      <button class="remove-item-btn" data-id="${item.id}">Xóa</button>
    </div>
  `).join("");

  // Tính tổng tiền
  const totalPrice = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
  cartList.innerHTML += `<hr/><h3 style="margin-left:10px;">Tổng tiền: ${totalPrice.toLocaleString('vi-VN')} ${cart[0]?.currency || 'VND'}</h3>`;
}
renderCart();