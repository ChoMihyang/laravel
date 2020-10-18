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

###2020-10-11(일)
1. task 수정하기
    ```bash
     Route::get('/tasks/{task}/edit', 'TaskController@edit'); 
   ```
   - @method('PUT') 추가
   - edit(view)의 action -> /tasks/{{ $task->id }}/edit
   - show(view)의 action -> /tasks/{{ $task->id }}
   - TaskController 내 edit 메서드 생성
   
2. 수정 내용 업데이트하기
    ```bash
     Route::put('/tasks/{task}', 'TaskController@update'); 
   ```
   - TaskController 내 update 메서드 생성
   -> request('title'); 추가

###2020-10-12(월)
1. task 삭제하기
    ```bash
     Route::delete('/tasks/{task}', 'TaskController@destroy'); 
   ```
   - @method('DELETE')추가
   - @csrf 추가
   - TaskController 내 destroy 메서드 생성 -> delete() 함수 사용
   - delete 버튼 생성
   
2. task 만들기 버튼 생성
    - index.blade 파일 수정
        - a태그 사용 -> /tasks/create 이동
        
3. 폼 Validation
    - 공란 상태로 submit 되는 것을 방지
    - create.blade와 edit.blade 파일 수정
    ```bash
    @error('title')
            <small class="text-red-700">{{ $message }}</small>
    @enderror  
    ```
###2020-10-15(목)
1. 폼 기존 값 유지하기
  - blade 파일에서 {{ }} 안에는 php코드를 적는다.
  - old() : 그 전에 사용했던 값을 가져올 수 있음
  - create.blade와 edit.blade 파일 수정
    ```bash
      value="{{ old('title') ? old('title') : '' }}"
      {{ old('body') ? old('body') : '' }}
    ```
###2020-10-17(토)
1. 로그인 기능 만들기
    - php artisan make:auth

2. 계정이 없는 상태에서도 게시글이 보이는 에러
    - Routh::get('/tasks', 'TaskController@index')->middleware('auth');
    - 여러 개를 입력해야 할 때
        - Route::prefix('tasks')->middleware('auth')->group(function(){ // Route 경로 });

3. 페이지에 공통 헤더 추가하기
    - 라라벨 제공 app.blade.php 의 stylesheet 사용하기
        - create, edit, show.blade.php 수정
        - @extends('layouts.app') 수정
    - app.blade.php 에 link 태그 추가
        ```bash
        <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
        ```

  
###2020-10-18
1. 테스크 권한(1)
- 계정에 따라 자신이 쓴 게시물만 보기
    1) 'user_id'테이블 추가
    ```bash
     $table->unsignedBigInteger('user_id');
     $table->foreign('user_id')->references('id')->on('users');
  ```
    2) 자신이 쓴 게시물만 조회
    ```bash
     $tasks = Task::latest()->where('user_id', auth()->id())->get();  
  ```

2. 테스트 권한(2)
- 계정에 따라 게시물 수정, 삭제 권한 주기
    1) 로그인한 유저가 태스크를 소유하고 있지 않다면 -> 접근 금지
    2) show, edit, update, destroy 메서드에 추가
    ```bash
    if(auth()->id() != $task->user_id){ abort(403); }
  ```
  ```bash
    abort_if(auth()->id() != $task->user_id, 403);
  ```
  ```bash
    abort_if(!auth()->user()->owns($task), 403);
  ```
  ```bash
    abort_unless(auth()->user()->owns($task), 403);
  ```
  
  2) owns 메서드 추가 (User.php)
  ```bash
  public function owns(Task $task){
          return auth()->id() == $task->user_id;
      }
  ```

3. 라우트 Resource
- web.php 
- Route::prefix('tasks')->middleware('auth') 에서 그룹으로 묶인
  모든 Route 들을 하나로 만들기
  ```bash
  Route::resource('task', 'TaskController')->middleware('auth');
  ```

4. 라라벨 모델 관계(Relation) 설정
    1) 사용자는 많은 Task를 가진다. (User.php)
    ```bash
       public function tasks(){
               return $this->hasMany(Task::class);
           }
   ```
   2) 하나의 Task는 한 명의 유저에 속한다. (Task.php)
   ```bash
    public function user(){
            return $this->belongsTo(User::class);
        }
   ```
   3) Task 테이블의 모든 정보를 조회 (TaskController.php -> index()
    ```bash
    $tasks = auth()->user()->tasks()->latest()->get();
    ```

