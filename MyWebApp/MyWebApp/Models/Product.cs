using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace MyWebApp.Models
{
    public class Product
    {
        [Key]
        public int Id { get; set; }

        [Required(ErrorMessage = "Tên sản phẩm không được để trống")]
        [StringLength(100)]
        public string Name { get; set; }

        [Range(0, double.MaxValue, ErrorMessage = "Giá phải lớn hơn 0")]
        public decimal Price { get; set; } // Giá bán

        public string? ImageUrl { get; set; } // Đường dẫn ảnh (cho phép null)

        [StringLength(500)]
        public string? Description { get; set; } // Mô tả

        // --- KHÓA NGOẠI ---
        [Required]
        public int CategoryId { get; set; } // Liên kết với bảng Category

        [ForeignKey("CategoryId")]
        public Category? Category { get; set; } // Tạo mối quan hệ để truy vấn
    }
}
