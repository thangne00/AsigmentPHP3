<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .img-thumbnail {
            width: 100%;
            height: auto;
            max-height: 200px;
            object-fit: cover;
            margin-bottom: 10px;
          
        }
        .img-fluid {
    max-width: 100%;
    height: auto;
}
.related-articles h3 {
    margin-bottom: 1rem;
}

.related-articles .card {
    border: 1px solid #ddd;
    border-radius: 0.25rem;
}

.related-articles .card-img-top {
    max-height: 200px;
    object-fit: cover;
}

.related-articles .card-body {
    text-align: center;
}
body {
            font-family: 'Open Sans', sans-serif;
            color: #333;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Roboto', sans-serif;
            font-weight: 700;
            color: #212529;
        }

        /* Kích thước ảnh */
        .img-thumbnail {
            width: 100%;
            height: auto;
            max-height: 300px;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        /* Thẻ tiêu đề bài viết */
        .card-title {
            font-family: 'Roboto', sans-serif;
            font-size: 1.25rem;
            color: #007bff;
        }

        /* Các liên kết */
        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        /* Thẻ tiêu đề footer */
        .footer-title {
            font-family: 'Roboto', sans-serif;
            font-weight: 700;
            color: #343a40;
        }

        /* Footer */
        .footer {
            background-color: #f8f9fa;
            color: #6c757d;
            padding: 2rem 0;
        }

        .footer .list-unstyled li {
            margin-bottom: 0.5rem;
        }

        .footer .social-icons a {
            font-size: 1.5rem;
            color: #6c757d;
            text-decoration: none;
            margin-right: 0.5rem;
        }

        .footer .social-icons a:hover {
            color: #343a40;
        }

        .footer .text-muted {
            font-size: 0.875rem;
        }

        /* Đảm bảo toàn bộ chiều cao của trang được lấp đầy */
        html, body {
            height: 100%;
            margin: 0;
        }

        /* Đặt body thành flex container với chiều cao tối thiểu 100% */
        body {
            display: flex;
            flex-direction: column;
        }

        /* Đảm bảo rằng footer nằm ở dưới cùng của trang */
        .main {
            flex: 1;
        }
/* Căn giữa hình ảnh trong phần tử chứa */
.text-center {
    text-align: center;
}
        /* Footer */
        .footer {
            background-color: #f8f9fa;
            color: #6c757d;
        }

        .footer-title {
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .footer .list-unstyled li {
            margin-bottom: 0.5rem;
        }

        .footer .social-icons a {
            font-size: 1.5rem;
            color: #6c757d;
            text-decoration: none;
            margin-right: 0.5rem;
        }

        .footer .social-icons a:hover {
            color: #343a40;
        }

        .footer .text-muted {
            font-size: 0.875rem;
        }
        /* Đảm bảo toàn bộ chiều cao của trang được lấp đầy */
html, body {
    height: 100%;
    margin: 0;
}

/* Đặt body thành flex container với chiều cao tối thiểu 100% */
body {
    display: flex;
    flex-direction: column;
}

/* Đảm bảo rằng footer nằm ở dưới cùng của trang */
.main {
    flex: 1;
}

/* Footer */
.footer {
    background-color: #f8f9fa;
    color: #6c757d;
}

.footer-title {
    font-weight: bold;
    margin-bottom: 1rem;
}

.footer .list-unstyled li {
    margin-bottom: 0.5rem;
}

.footer .social-icons a {
    font-size: 1.5rem;
    color: #6c757d;
    text-decoration: none;
    margin-right: 0.5rem;
}

.footer .social-icons a:hover {
    color: #343a40;
}

.footer .text-muted {
    font-size: 0.875rem;
}

    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- Logo -->
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo" style="height: 40px;">

            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    @foreach (App\Models\Category::all() as $category)
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('articles.index', ['category_id' => $category->id]) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
                <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('articles.search') }}">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="query">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>
    

    <main class="container mt-4">
        @yield('content')
    </main>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <div class="row">

                <div class="col-md-4 mb-3">
                    <h5 class="footer-title">Thông Tin Liên Hệ</h5>
                    <img src="{{ asset('images/logo2.jpg') }}" alt="Logo" style="height: 90px;width:300px">
                    <p>Địa chỉ: Trịnh Văn Bô, Nam Từ Liêm, Hà Nội</p>
                    <p>Email: <a href="mailto:thangndph37125@fpt.edu.vn">thangndph37125@fpt.edu.vn</a></p>
                    <p>Điện thoại: <a href="tel:0366735093">0366735093</a></p>
                </div>

                <div class="col-md-4 mb-3">
                    <h5 class="footer-title">Liên Kết Nhanh</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}">Trang Chủ</a></li>
                    </ul>
                </div>

                <div class="col-md-4 mb-3">
                    <h5 class="footer-title">Theo Dõi Chúng Tôi</h5>
                    <div class="social-icons">
                        <a href="https://facebook.com" target="_blank" class="me-2">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com" target="_blank" class="me-2">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://instagram.com" target="_blank" class="me-2">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://linkedin.com" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <span class="text-muted">© {{ date('Y') }}News-Website - Tin tức hàng đầu 24/7.</span>
            </div>
        </div>
    </footer>


    <!-- Bootstrap JS và các thư viện phụ thuộc -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
