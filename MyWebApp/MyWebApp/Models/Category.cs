using System.ComponentModel.DataAnnotations;

namespace MyWebApp.Models
{
        public class Category
        {
            [Key]
            public int Id { get; set; }

            [Required]
            [StringLength(50)]
            public string Name { get; set; } // Tên danh mục

            public int DisplayOrder { get; set; } // Thứ tự hiển thị
        }
}
