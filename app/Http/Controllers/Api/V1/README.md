# API

## エンドポイント

| API名 | endpoint | method | body | 備考 |
|-------|----------|----|------|-----|
| 新規登録 | /api/v1/register | POST | name: string, nickname: string, email: string, password: string |  |
| ログイン | /api/v1/login | POST | email: string, password: string |   |
| ログアウト | /api/v1/logout | DELETE |  |  |
| 商品一覧 | /api/v1/products | GET |  |  |
| 消費税一覧 | /api/v1/products | GET |  |  |
| カート一覧 | /api/v1/carts | GET |  |  |
| カート追加 | /api/v1/carts | POST | product_id: number, quantity: number |  |
| カート編集 | /api/v1/carts/{id} | PATCH | quantity: number |  |
| カート削除 | /api/v1/carts/{id} | DELETE |  |  |
| 注文履歴一覧 | /api/v1/orders | GET |  |  |

## レスポンス

APIのレスポンスはすべてjson形式。

```
{
    data: 取得したデータを格納
    message: エラー発生時などにどんなエラーが出ているか格納
    meta: ページネーション時などにページネーション情報などを格納
}
```
