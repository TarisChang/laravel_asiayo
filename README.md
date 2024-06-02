
## API 實作測驗

- 請使用 docker 包裝您的環境。
 專案啟動指令：
```
docker build -t laravel-asiayo . 
docker run -it -p 8000:8000 laravel-asiayo
```
- Controller 接收 GET 參數時,請使用 Laravel 的 FormRequest

  請參見 `ExchageRequest.php` 
- 需驗證使用者輸入的值。source、target 為字串,amount 輸入時無論有無千分位
皆可接受。例如「1,525」或「1525」皆可。

  請參見 `ExchageRequest.php` rules()

- 請新增 CurrencyExchangeService,並且使用依賴注入 (Dependency Injection,
DI) 以下靜態匯率資料。

  請參見 `CurrencyExchangeService.php`  

- 轉換後的結果,請四捨五入到小數點第二位。

  Request：http://0.0.0.0:8000/api/exchange?source=USD&target=JPY&amount=1,525

  Response：```{
  msg: "success",
  amount: "170,496.53"
}```

- 轉換後的結果,請加上半形逗點作為千分位表示,每三個位數一點。

  同上測試結果

- CurrencyExchangeService 必須包含(但不限於)以下測試案例
  - [x] 若輸入的 source 或 target 系統並不提供時的案例
  - [x] 若輸入的金額為非數字或無法辨認時的案例
  - [x] 輸入的數字需四捨五入到小數點第二位,並請提供覆蓋有小數與沒有
小數的多種案例

- 實作結果需以 GitHub、GitLab、Bitbucket 或其他程式碼托管網站連結呈現。
  GitHub Link： https://github.com/TarisChang/laravel_asiayo