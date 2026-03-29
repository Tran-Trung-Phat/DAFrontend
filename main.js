function updateCartCount() {
  let cart = JSON.parse(localStorage.getItem("cart")) || [];

  let total = 0;

  cart.forEach(item => {
    total += item.quantity;
  });

  const cartCount = document.getElementById("cart-count");
  if (cartCount) {
    cartCount.innerText = total;
  }
}

// gọi khi load trang
updateCartCount();
