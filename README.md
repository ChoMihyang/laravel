# laravel 기초

### 2020-08-03(월)

1. 컴포저 설치

2. 라라벨 기본 설정 디렉터리 및 파일 생성

3. 라라벨 홈페이지 서버 가동
    ```bash
    php artisan serve
    ```
4. 기본 라우팅

5. 블레이드 레이아웃

### 2020-08-04(화)
1. Laravel - MVC 패턴
    - Model : User.php
    - View : blade.php
    - Controller : Controller.php

2. 기본 라우팅

    ```php
    Route::get([url], [action]); 
    ```
   
3. 블레이드 레이아웃
    - @extends    
    - @section ~ @endsection
  
4. 블레이드로 데이터 보내기

5. Controller
    - 클래스 형태로 존재
    - 컨트롤러 생성 명령어
    ```bash
       php artisan make:controller <name>
    ```
    
