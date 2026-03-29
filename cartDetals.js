import { addToCart } from './cart.js';

// Tìm tất cả các nút "Thêm vào giỏ" bằng class name
const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');

// Kiểm tra xem mảng 'products' đã được tải từ file product.js chưa
if (typeof products === 'undefined') {
    console.error("Lỗi: Mảng 'products' không tồn tại. Hãy chắc chắn file product.js đã được nhúng vào HTML trước file này.");
} else {
    // Lặp qua mỗi nút và gán sự kiện click
    addToCartButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault(); // Ngăn hành vi mặc định của thẻ <a>

            // Lấy ID sản phẩm từ thuộc tính data-product-id
            const productId = parseInt(button.dataset.productId);

            // Tìm sản phẩm tương ứng trong mảng 'products'
            const productToAdd = products.find(p => p.id === productId);

            if (productToAdd) {
                // Gọi hàm addToCart với sản phẩm tìm được và số lượng là 1
                addToCart(productToAdd, 1);
            
                alert(`Đã thêm "${productToAdd.name}" vào giỏ hàng!`);
            }
        });
    });
}