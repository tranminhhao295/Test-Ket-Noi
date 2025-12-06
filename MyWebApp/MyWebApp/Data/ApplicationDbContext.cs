using MyWebApp.Models;
using System.Collections.Generic;
using Microsoft.EntityFrameworkCore;
namespace MyWebApp.Data
{
    public class ApplicationDbContext : DbContext
    {
        // Constructor này nhận các tùy chọn cấu hình (như chuỗi kết nối) và truyền cho lớp cha
        public ApplicationDbContext(DbContextOptions<ApplicationDbContext> options) : base(options)
        {
        }

        // Khai báo bảng Categories. Tên property 'Categories' sẽ là tên bảng trong SQL
        public DbSet<Category> Categories { get; set; }
        public DbSet<Product> Products { get; set; }
    }
}
