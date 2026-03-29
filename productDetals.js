import { addToCart } from "./cart.js";

const urlParams = new URLSearchParams(window.location.search);
const productId = parseInt(urlParams.get('id'));

const selectedProduct = products.find( product => product.id === productId);



if (selectedProduct){
  document.title = selectedProduct.name + " - PRAGUE";
  document.getElementById('product-name').textContent = selectedProduct.name;
  document.getElementById('product-price').textContent = `${selectedProduct.price.toLocaleString('vi-VN')} ${selectedProduct.currency}`;
  document.getElementById('product-image').src = selectedProduct.image;
  document.getElementById('product-image').alt = selectedProduct.name;
  document.getElementById('product-desc').textContent = selectedProduct.description;

  // Chuyển sự kiện click vào đây để đảm bảo selectedProduct tồn tại
  document.getElementById('addToCart').addEventListener('click', () => {
    // Lấy giá trị số lượng từ giao diện
    const quantityInput = document.getElementById('quantity');
    const quantity = quantityInput ? parseInt(quantityInput.value) : 1;
    
    addToCart(selectedProduct, quantity);
    alert('Sản phẩm đã được thêm vào giỏ hàng!');
  });
}else{
  document.getElementById('product-detail-container').innerHTML = `
    <div class="text-center mt-5">
      <h2 class="text-danger mb-4">Sản phẩm không tồn tại!</h2>
      <a href="index6.html" class="btn btn-outline-dark">Quay lại danh sách</a>
    </div>`;
}

       