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
    
### 2020-08-05(수)
1. 마이그레이션
    - 데이터베이스에 대한 버전 컨트롤 역할
    - 데이터베이스 수정과 협업 시 스키마 공유 가능
    
2. 마이그레이션 메서드 - up, down 
    - up : 데이터베이스에 테이블, 컬럼, 인덱스를 추가
    - down : up 메서드의 동작을 취소 
    
3. 마이그레이션 동작
    - 실행하기
    ```bash
       php artisan migrate 
   ```
   - 되돌리기(롤백)
   ```bash
       php artisan migrate:rollback
   ```
    
###2020-08-08(토)
1. 마이그레이션 생성
    - php artisan make:migration [name]
    - 복수형 파일명
    - database/migrations 디렉토리에 생성
    
2. 테이블 생성
    - migration 의 up() 메서드 사용
    - 컬럼 타입
    ```bash
       1) 자동 증가      : $table->bigIncrements('id'); 
       2) BIGINT 컬럼    : $table->bigInteger('votes');
       3) LONGTEXT 컬럼  : $table->longText('description');
       4) TIMESTAMP 컬럼 : $table->timestamps();
       ...
   ```
3. 모델 생성 
    - php artisan make:model [name]
    - 단수형 파일명

4. tailwindcss 설치

###2020-08-09(일)

1. tailwindcss 설치

###2020-08-10(월)
1. MVC 파일 생성하기
    - 모델 생성(migration file, controller 포함)
    ```bash
    php artisan make:model <모델명> -c -m    
    ```
2. routes
    - /tasks 페이지에서 TaskController 클래스의 index 메서드 실행
    ```bash
    Route::get('/tasks', 'TaskController@index');    
    ```
3. Tip) blade.php
    ```bash
    @section('title')
       Create Task
    @endsection
   <=> 
    @section('title', 'Create Task')
    @endsection
    ```
   
###2020-08-11(화)
1. 라라벨 폼 만들기
    - tasks Table 생성
    - Route::get / Route::post 사용
    - csrf 사용
    
2. 폼 submit 처리하기
    - tailwindcss 활용
    - {{ }} 사용
    
###2020-08-12(수)
1. task 디테일 페이지
    - id 값 삽입 -> view 기능 구현
