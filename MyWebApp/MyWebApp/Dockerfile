# Giai đoạn 1: Build ứng dụng
FROM mcr.microsoft.com/dotnet/sdk:6.0 AS build
WORKDIR /app

# Copy file .csproj và restore các thư viện
COPY *.csproj ./
RUN dotnet restore

# Copy toàn bộ code còn lại và build
COPY . ./
RUN dotnet publish -c Release -o out

# Giai đoạn 2: Chạy ứng dụng
FROM mcr.microsoft.com/dotnet/aspnet:6.0
WORKDIR /app
COPY --from=build /app/out .

# Cấu hình để SQLite tạo được file database trong container
# (Lưu ý: Trên môi trường thật file db sẽ bị reset mỗi lần deploy lại nếu không dùng Volume, 
# nhưng với bài tập thì chấp nhận được)
ENTRYPOINT ["dotnet", "MyWebApp.dll"]