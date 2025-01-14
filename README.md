# 系統畫面

## 訪客

### 首頁
<a href ="https://imgur.com/PBUd8Dc"><img src="https://i.imgur.com/PBUd8Dc.jpg" title="source: imgur.com" /></a>
### 登入
<a href ="https://imgur.com/SeAKGCE"><img src="https://i.imgur.com/SeAKGCE.jpg" title="source: imgur.com" /></a>
### 註冊
<a href ="https://imgur.com/WqckWBh"><img src="https://i.imgur.com/WqckWBh.jpg" title="source: imgur.com" /></a>

## 會員
### 首頁
<a href ="https://imgur.com/RQkCgxw"><img src="https://i.imgur.com/RQkCgxw.jpg" title="source: imgur.com" /></a>
### 商品資訊
<a href ="https://imgur.com/SdhAbaq"><img src="https://i.imgur.com/SdhAbaq.jpg" title="source: imgur.com" /></a>
### 搜尋商品
<a href ="https://imgur.com/H6vXx9T"><img src="https://i.imgur.com/H6vXx9T.png" title="source: imgur.com" /></a>
### 結帳
<a href ="https://imgur.com/2Zo7GKq"><img src="https://i.imgur.com/2Zo7GKq.jpg" title="source: imgur.com" /></a>
### 賣家頁面
<a href ="https://imgur.com/moTB4fO"><img src="https://i.imgur.com/moTB4fO.jpg" title="source: imgur.com" /></a>
### 新增商品
<a href ="https://imgur.com/nqANeLW"><img src="https://i.imgur.com/nqANeLW.jpg" title="source: imgur.com" /></a>
### 修改商品
<a href ="https://imgur.com/nU3kX6A"><img src="https://i.imgur.com/nU3kX6A.png" title="source: imgur.com" /></a>
### 刪除商品
<a href ="https://imgur.com/1CI3Rb4"><img src="https://i.imgur.com/1CI3Rb4.png" title="source: imgur.com" /></a>
### 提出建議
<a href ="https://imgur.com/2VmSmSA"><img src="https://i.imgur.com/2VmSmSA.png" title="source: imgur.com" /></a>

## 管理員
### 首頁
<a href ="https://imgur.com/HTDfYnY"><img src="https://i.imgur.com/HTDfYnY.jpg" title="source: imgur.com" /></a>
### 意見管理
<a href ="https://imgur.com/cb8xNSZ"><img src="https://i.imgur.com/cb8xNSZ.jpg" title="source: imgur.com" /></a>

# 系統名稱及作用

本地手工藝品交易平台

   - 手工藝線上交易
   
   - 提供手工藝品銷路
    
   - 讓顧客、賣家更方便且快速的找到買賣途徑 
   
# 系統主要功能
##  訪客
  - 將  / /dashboard /order定向至主頁面 
    (Route::get('/', function () {
        $products = DB::table('products')->get();
        return view('welcome', compact('products'));
    })->name('welcome');)
    Route::get('/dashboard', function () {
        $products = Product::all();
        return view('welcome', compact('products'));
    })->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/order', function () {
        $products = Product::all();
        return view('welcome', compact('products'));
    }); [曾永全 3B132016](https://github.com/3B132016)
  
  ><訂單>
  - 初始化顧客訂單 (Route::get('/init',[OrderController::class,'init'])->name('orders.init');) [黃河濤 3B032081](https://github.com/student3B032081)
  - 點餐頁面 (Route::get('/orders',[OrderController::class,'index'])->name('orders.index');) [黃河濤 3B032081](https://github.com/student3B032081)
  - 新增訂單 (Route::get('/orders/create/{order}', [OrderController::class, 'create'])->name('orders.create');) [黃河濤 3B032081](https://github.com/student3B032081)
  - 儲存結帳資訊 (Route::post('/orders/{order}', [OrderController::class, 'store'])->name('orders.store');) [黃河濤 3B032081](https://github.com/student3B032081)
  - 訂單詳情 (Route::get('/orders/{order}/show', [OrderController::class, 'show'])->name('orders.show');) [黃河濤 3B032081](https://github.com/student3B032081)
  - 訂單餐點編輯 (Route::get('/orders/{order}/edit',[OrderController::class,'edit'])->name('orders.edit');) [黃河濤 3B032081](https://github.com/student3B032081)
  - 訂單餐點更新 (Route::patch('/orders/{order}',[OrderController::class,'update'])->name('orders.update');) [黃河濤 3B032081](https://github.com/student3B032081)
  
  ><訂單明細>
  - 目前顧客之訂單 (Route::get('/OrderItem',[OrderItemController::class,'index'])->name('OrderItem.index');) [黃河濤 3B032081](https://github.com/student3B032081)
  - 新增餐點至明細 (Route::get('/OrderItem/create/{meal}', [OrderItemController::class, 'create'])->name('OrderItem.create');) [黃河濤 3B032081](https://github.com/student3B032081)
  - 儲存訂單明細資料 (Route::post('/OrderItem/{meal}', [OrderItemController::class, 'store'])->name('OrderItem.store');) [黃河濤 3B032081](https://github.com/student3B032081)
  - 刪除訂單明細資料 (Route::delete('/OrderItem/{orderItem}',[OrderItemController::class,'destroy'])->name('OrderItem.destroy');) [黃河濤 3B032081](https://github.com/student3B032081)
  - 訂單明細頁面 (Route::get('/OrderItem/show', [OrderItemController::class, 'show'])->name('OrderItem.show');) [黃河濤 3B032081](https://github.com/student3B032081)
  - 編輯訂單明細頁面 (Route::get('/OrderItem/{orderItem}/edit',[OrderItemController::class,'edit'])->name('OrderItem.edit');) [黃河濤 3B032081](https://github.com/student3B032081)
  - 更新訂單明細資料 (Route::patch('/OrderItem/{orderItem}',[OrderItemController::class,'update'])->name('OrderItem.update');) [黃河濤 3B032081](https://github.com/student3B032081)

##  會員

  ><餐點管理>
  - 餐點列表 (Route::get('/meals',[MealController::class,'index'])->name('meals.index');) [曾永全 3B132016](https://github.com/3B132016)
  - 新增餐點頁面 (Route::get('/meals/create', [MealController::class, 'create'])->name('meals.create');) [曾永全 3B132016](https://github.com/3B132016)
  - 儲存餐點資料 (Route::post('/meals', [MealController::class, 'store'])->name('meals.store');) [曾永全 3B132016](https://github.com/3B132016)
  - 刪除餐點資料 (Route::delete('/meals/{meal}',[MealController::class,'destroy'])->name('meals.destroy');) [曾永全 3B132016](https://github.com/3B132016)
  - 餐點詳情頁面 (Route::get('/meals/{meal}/show', [MealController::class, 'show'])->name('meals.show');) [曾永全 3B132016](https://github.com/3B132016)
  - 編輯餐點頁面 (Route::get('/meals/{meal}/edit',[MealController::class,'edit'])->name('meals.edit');) [曾永全 3B132016](https://github.com/3B132016)
  - 更新餐點資料 (Route::patch('/meals/{meal}',[MealController::class,'update'])->name('meals.update');) [曾永全 3B132016](https://github.com/3B132016)
  
 ><類別管理>
  - 類別列表 (Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');) [黃鐙霆 3B132047](https://github.com/3B132047)
  - 新增類別頁面 (Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');) [黃鐙霆 3B132047](https://github.com/3B132047)
  - 儲存類別資料 (Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');) [黃鐙霆 3B132047](https://github.com/3B132047)
  - 編輯類別頁面 (Route::get('/categories/{category}/edit',[CategoryController::class,'edit'])->name('categories.edit');) [黃鐙霆 3B132047](https://github.com/3B132047)
  - 更新類別資料 (Route::patch('/categories/{category}',[CategoryController::class,'update'])->name('categories.update');) [黃鐙霆 3B132047](https://github.com/3B132047)
  - 餐點詳情頁面 (Route::get('/categories/{category}/show', [CategoryController::class, 'show'])->name('categories.show');) [黃鐙霆 3B132047](https://github.com/3B132047)
  - 刪除餐點資料 (Route::delete('/categories/{category}',[CategoryController::class,'destroy'])->name('categories.destroy');) [黃鐙霆 3B132047](https://github.com/3B132047)

##  平台人員
  - 訂單列表  Route::get('/orders',[StaffController::class,'index'])->name('orders.index'); [黃鐙霆 3B132047](https://github.com/3B132047)
  - 訂單詳細 Route::get('/orders/{order}/show',[StaffController::class,'show'])->name('orders.show'); [黃鐙霆 3B132047](https://github.com/3B132047)
  - 餐點完成按鈕 Route::patch('/orderItems/{orderItem}',[StaffController::class,'itemstatus'])->name('itemstatus.update'); [黃鐙霆 3B132047](https://github.com/3B132047)
  - 歷史訂單列表 Route::get('/orders/finish',[StaffController::class,'finish'])->name('orders.finish'); [黃鐙霆 3B132047](https://github.com/3B132047)
  - 訂單完成按鈕 Route::patch('/orders/{order}',[StaffController::class,'orderstatus'])->name('orderstatus.update'); [黃鐙霆 3B132047](https://github.com/3B132047)
  - 刪除訂單 Route::delete('/orders/{order}',[StaffController::class,'destroy'])->name('orders.destroy'); [黃鐙霆 3B132047](https://github.com/3B132047)

# ERD
<a href ="https://imgur.com/HlGWvLz"><img src="https://i.imgur.com/HlGWvLz.jpg" title="source: imgur.com" /></a>
# 關聯式綱要圖 
<a href ="https://imgur.com/a/srt0xLc"><img src="https://i.imgur.com/BmNSINI.jpg" title="source: imgur.com" /></a>
# 實際資料表欄位設計 
  - 資料表
  <a href ="https://imgur.com/a/sld5n7n"><img src="https://imgur.com/a/sld5n7n.jpg" title="source: imgur.com" /></a>
  
# 初始專案與DB負責與readme撰寫的同學
- 初始專案 [許睿舜 3B132076](https://github.com/3B132076)
- DB [陳炫樺 3B134037](https://github.com/3B134037)
- readme撰寫[許睿舜 3B132076](https://github.com/3B132076) [陳令祥 3B132074](https://github.com/3B132074)

# 額外使用的套件或樣板  

- startbootstrap
    ```
    介面清楚明瞭，方便操作。
    ```
    

# 系統測試資料存放位置  
- final02底下的sql資料夾
 
# 系統使用者測試帳號  
    
    帳號:seller@example.com(會員)
    密碼:password123
    帳號:Admin@example.com(管理人員)
    密碼:password123
    

# 系統開發人員與工作分配  

- [陳令祥 3B132074](https://github.com/3B132016)
    ```
    訪客、買家介面管理
    ```
- [許睿舜 3B132076](https://github.com/3B132047)
    ```
    平台人員管理、登入系統、主頁介面
    ```   
- [陳炫樺 3B032081](https://github.com/student3B032081) 
    ```
    賣家介面管理、買家介面管理、商品介面管理
    ```
