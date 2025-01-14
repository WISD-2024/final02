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
   
## 路由功能說明

### 首頁與基本路由

- **主頁面**  
  `Route::get('/', function () { $products = DB::table('products')->get(); return view('welcome', compact('products')); })->name('welcome');` [許睿舜 3B132076](https://github.com/3B132076)
- **儀表板**  
  `Route::get('/dashboard', function () { $products = Product::all(); return view('welcome', compact('products')); })->middleware(['auth', 'verified'])->name('dashboard');` [許睿舜 3B132076](https://github.com/3B132076)
- **訂單頁面**  
  `Route::get('/order', function () { $products = Product::all(); return view('welcome', compact('products')); });` [陳炫樺 3B134037](https://github.com/3B134037)

---

### 認證功能

- **編輯用戶資料**  
  `Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');` [許睿舜 3B132076](https://github.com/3B132076)
- **更新用戶資料**  
  `Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');` [許睿舜 3B132076](https://github.com/3B132076)
- **刪除用戶帳號**  
  `Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');` [許睿舜 3B132076](https://github.com/3B132076)
- **包含預設的認證路由**  
  `require DIR.'/auth.php';` [許睿舜 3B132076](https://github.com/3B132076)

---

### 賣家功能

- **賣家儀表板**  
  `Route::get('seller/dashboard', [SellerController::class, 'dashboard']);` [陳炫樺 3B134037](https://github.com/3B134037)
- **管理商品資源路由**  
  `Route::resource('seller/products', ProductController::class);` [陳炫樺 3B134037](https://github.com/3B134037)
- **賣家頁面**  
  `Route::get('/seller/create', [SellerController::class, 'index'])->name('seller.index');` [陳炫樺 3B134037](https://github.com/3B134037)
- **新增商品**  
  `Route::get('create', [SellerController::class, 'create'])->name('seller.create');` [陳炫樺 3B134037](https://github.com/3B134037)
- **儲存商品**  
  `Route::post('store', [SellerController::class, 'store'])->name('seller.store');` [陳炫樺 3B134037](https://github.com/3B134037)
- **編輯商品**  
  `Route::get('edit/{product}', [SellerController::class, 'edit'])->name('seller.edit');` [陳炫樺 3B134037](https://github.com/3B134037)
- **更新商品**  
  `Route::put('update/{product}', [SellerController::class, 'update'])->name('seller.update');` [陳炫樺 3B134037](https://github.com/3B134037)
- **刪除商品**  
  `Route::delete('destroy/{product}', [SellerController::class, 'destroy'])->name('seller.destroy');` [陳炫樺 3B134037](https://github.com/3B134037)

---

### 管理員功能

- **登入**  
  `Route::post('/login', [LoginController::class, 'login'])->name('login');` [許睿舜 3B132076](https://github.com/3B132076)
- **管理員儀表板**  
  `Route::middleware(['auth', 'is_admin'])->group(function () { Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard'); });` [許睿舜 3B132076](https://github.com/3B132076)
- **投訴管理**  
  `Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () { Route::get('/', [ComplaintController::class, 'dashboard'])->name('admin.dashboard'); Route::post('/complaints', [ComplaintController::class, 'store'])->name('complaints.store'); });` [許睿舜 3B132076](https://github.com/3B132076)

---

### 產品、購物車與訂單功能

- **搜尋產品**  
  `Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');` [陳炫樺 3B134037](https://github.com/3B134037)
- **商品詳情**  
  `Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');` [陳炫樺 3B134037](https://github.com/3B134037)
- **商品列表**  
  `Route::get('products/by_seller/{seller}', [ProductController::class, 'by_seller'])->name('products.index');` [陳炫樺 3B134037](https://github.com/3B134037)
- **加入購物車**  
  `Route::post('/cart_items', [CartItemController::class, 'store'])->name('cart_items.store');` [陳令祥 3B132074](https://github.com/3B132074)
- **刪除購物車**  
  `Route::delete('/cart_items/{cart_item}', [CartItemController::class, 'destroy'])->name('cart_items.destroy');` [陳令祥 3B132074](https://github.com/3B132074)
- **新增訂單**  
  `Route::get('orders/create', [OrderController::class, 'create'])->name('orders.create');` [陳炫樺 3B134037](https://github.com/3B134037)
- **儲存訂單**  
  `Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');` [陳炫樺 3B134037](https://github.com/3B134037)
- **查看訂單詳情**  
  `Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');` [陳令祥 3B132074](https://github.com/3B132074)
- **查看所有訂單**  
  `Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');` [陳令祥 3B132074](https://github.com/3B132074)
- **取消訂單**  
  `Route::patch('orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');` [陳令祥 3B132074](https://github.com/3B132074)


# ERD
<a href ="https://imgur.com/HlGWvLz"><img src="https://i.imgur.com/HlGWvLz.jpg" title="source: imgur.com" /></a>
# 關聯式綱要圖 
<a href ="https://imgur.com/a/srt0xLc"><img src="https://i.imgur.com/BmNSINI.jpg" title="source: imgur.com" /></a>
# 實際資料表欄位設計 
  - 使用者(users)資料表
  <a href ="https://imgur.com/0xGR83e"><img src="https://i.imgur.com/0xGR83e.jpg" title="source: imgur.com" /></a>
  - 類別(categories)資料表
  <a href ="https://imgur.com/2tWlyH3"><img src="https://i.imgur.com/2tWlyH3.jpg" title="source: imgur.com" /></a>
  - 餐點(meals)資料表
  <a href ="https://imgur.com/JpKYLii"><img src="https://i.imgur.com/JpKYLii.jpg" title="source: imgur.com" /></a>
  - 訂單(orders)資料表
  <a href ="https://imgur.com/OynV6o1"><img src="https://i.imgur.com/OynV6o1.jpg" title="source: imgur.com" /></a>
  - 訂單明細(order_items)資料表
  <a href ="https://imgur.com/J0QVPGN"><img src="https://i.imgur.com/J0QVPGN.jpg" title="source: imgur.com" /></a>
  
# 初始專案與DB負責與readme撰寫的同學
- 初始專案 [許睿舜 3B132076](https://github.com/3B132076)
- DB [陳炫樺 3B134037](https://github.com/3B134037) [許睿舜 3B132076](https://github.com/3B132076)
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