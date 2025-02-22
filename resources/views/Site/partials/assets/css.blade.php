
      <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="{{ asset('Site/assets/css/styles' . (session('locale', app()->getLocale()) == 'ar' ? '_ar' : '') . '.css')}}">