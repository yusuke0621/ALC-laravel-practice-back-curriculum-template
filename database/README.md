### 住所


```
mysql> desc addresses;
+----------------+-----------------+------+-----+---------+----------------+
| Field          | Type            | Null | Key | Default | Extra          |
+----------------+-----------------+------+-----+---------+----------------+
| id             | bigint unsigned | NO   | PRI | NULL    | auto_increment |
| user_id        | bigint unsigned | NO   | MUL | NULL    |                |
| name           | varchar(255)    | NO   |     | NULL    |                |
| postal_code    | varchar(255)    | NO   |     | NULL    |                |
| prefecture     | varchar(255)    | NO   |     | NULL    |                |
| address_line_1 | varchar(255)    | NO   |     | NULL    |                |
| address_line_2 | varchar(255)    | NO   |     | NULL    |                |
| building       | varchar(255)    | YES  |     | NULL    |                |
| room_number    | varchar(255)    | YES  |     | NULL    |                |
| created_at     | timestamp       | YES  |     | NULL    |                |
| updated_at     | timestamp       | YES  |     | NULL    |                |
| deleted_at     | timestamp       | YES  |     | NULL    |                |
+----------------+-----------------+------+-----+---------+----------------+
```

---

### カート

```
mysql> desc carts;
+------------+-----------------+------+-----+---------+----------------+
| Field      | Type            | Null | Key | Default | Extra          |
+------------+-----------------+------+-----+---------+----------------+
| id         | bigint unsigned | NO   | PRI | NULL    | auto_increment |
| user_id    | bigint unsigned | NO   | MUL | NULL    |                |
| product_id | bigint unsigned | NO   | MUL | NULL    |                |
| quantity   | int             | NO   |     | 1       |                |
| created_at | timestamp       | YES  |     | NULL    |                |
| updated_at | timestamp       | YES  |     | NULL    |                |
| deleted_at | timestamp       | YES  |     | NULL    |                |
+------------+-----------------+------+-----+---------+----------------+
```

---

### カテゴリー

```
mysql> desc categories;
+------------+-----------------+------+-----+---------+----------------+
| Field      | Type            | Null | Key | Default | Extra          |
+------------+-----------------+------+-----+---------+----------------+
| id         | bigint unsigned | NO   | PRI | NULL    | auto_increment |
| name       | varchar(255)    | NO   |     | NULL    |                |
| priority   | int             | NO   |     | 0       |                |
| created_at | timestamp       | YES  |     | NULL    |                |
| updated_at | timestamp       | YES  |     | NULL    |                |
| deleted_at | timestamp       | YES  |     | NULL    |                |
+------------+-----------------+------+-----+---------+----------------+
```

---

### 画像・動画

```
mysql> desc media;
+-----------------+-----------------+------+-----+---------+----------------+
| Field           | Type            | Null | Key | Default | Extra          |
+-----------------+-----------------+------+-----+---------+----------------+
| id              | bigint unsigned | NO   | PRI | NULL    | auto_increment |
| user_id         | bigint unsigned | NO   | MUL | NULL    |                |
| mediumable_type | varchar(255)    | NO   | MUL | NULL    |                |
| mediumable_id   | bigint unsigned | NO   |     | NULL    |                |
| file_name       | varchar(255)    | NO   |     | NULL    |                |
| file_type       | varchar(255)    | NO   |     | NULL    |                |
| created_at      | timestamp       | YES  |     | NULL    |                |
| updated_at      | timestamp       | YES  |     | NULL    |                |
| deleted_at      | timestamp       | YES  |     | NULL    |                |
+-----------------+-----------------+------+-----+---------+----------------+
```

---

### 注文詳細

```
mysql> desc order_products;
+------------+-----------------+------+-----+---------+----------------+
| Field      | Type            | Null | Key | Default | Extra          |
+------------+-----------------+------+-----+---------+----------------+
| id         | bigint unsigned | NO   | PRI | NULL    | auto_increment |
| order_id   | bigint unsigned | NO   | MUL | NULL    |                |
| product_id | bigint unsigned | NO   | MUL | NULL    |                |
| price      | int             | NO   |     | NULL    |                |
| quantity   | int             | NO   |     | NULL    |                |
| tax_rate   | double(8,2)     | NO   |     | NULL    |                |
| created_at | timestamp       | YES  |     | NULL    |                |
| updated_at | timestamp       | YES  |     | NULL    |                |
| deleted_at | timestamp       | YES  |     | NULL    |                |
+------------+-----------------+------+-----+---------+----------------+
```

---

### 注文

```
mysql> desc orders;
+--------------+-----------------+------+-----+---------+----------------+
| Field        | Type            | Null | Key | Default | Extra          |
+--------------+-----------------+------+-----+---------+----------------+
| id           | bigint unsigned | NO   | PRI | NULL    | auto_increment |
| user_id      | bigint unsigned | NO   | MUL | NULL    |                |
| address_id   | bigint unsigned | YES  | MUL | NULL    |                |
| total_price  | double(8,2)     | NO   |     | NULL    |                |
| payment_type | varchar(255)    | NO   |     | NULL    |                |
| created_at   | timestamp       | YES  |     | NULL    |                |
| updated_at   | timestamp       | YES  |     | NULL    |                |
| deleted_at   | timestamp       | YES  |     | NULL    |                |
+--------------+-----------------+------+-----+---------+----------------+
```

---

### 商品

```
mysql> desc products;
+-------------+-----------------+------+-----+---------+----------------+
| Field       | Type            | Null | Key | Default | Extra          |
+-------------+-----------------+------+-----+---------+----------------+
| id          | bigint unsigned | NO   | PRI | NULL    | auto_increment |
| store_id    | bigint unsigned | NO   | MUL | NULL    |                |
| category_id | bigint unsigned | NO   | MUL | NULL    |                |
| tax_rate_id | bigint unsigned | NO   | MUL | NULL    |                |
| name        | varchar(255)    | NO   |     | NULL    |                |
| description | text            | YES  |     | NULL    |                |
| price       | int             | NO   |     | NULL    |                |
| created_at  | timestamp       | YES  |     | NULL    |                |
| updated_at  | timestamp       | YES  |     | NULL    |                |
| deleted_at  | timestamp       | YES  |     | NULL    |                |
+-------------+-----------------+------+-----+---------+----------------+
```

---

### レビュー

```
mysql> desc reviews;
+------------+---------------------------+------+-----+---------+----------------+
| Field      | Type                      | Null | Key | Default | Extra          |
+------------+---------------------------+------+-----+---------+----------------+
| id         | bigint unsigned           | NO   | PRI | NULL    | auto_increment |
| product_id | bigint unsigned           | NO   | MUL | NULL    |                |
| user_id    | bigint unsigned           | NO   | MUL | NULL    |                |
| rating     | enum('1','2','3','4','5') | NO   |     | NULL    |                |
| title      | varchar(255)              | YES  |     | NULL    |                |
| body       | text                      | YES  |     | NULL    |                |
| created_at | timestamp                 | YES  |     | NULL    |                |
| updated_at | timestamp                 | YES  |     | NULL    |                |
| deleted_at | timestamp                 | YES  |     | NULL    |                |
+------------+---------------------------+------+-----+---------+----------------+
```

---

### 店・出品者のユーザー

```
mysql> desc store_users;
+------------+-----------------+------+-----+---------+-------+
| Field      | Type            | Null | Key | Default | Extra |
+------------+-----------------+------+-----+---------+-------+
| user_id    | bigint unsigned | NO   | PRI | NULL    |       |
| store_id   | bigint unsigned | NO   | PRI | NULL    |       |
| created_at | timestamp       | YES  |     | NULL    |       |
| updated_at | timestamp       | YES  |     | NULL    |       |
+------------+-----------------+------+-----+---------+-------+
```

---

### 店・出品者

```
mysql> desc stores;
+------------+-----------------+------+-----+---------+----------------+
| Field      | Type            | Null | Key | Default | Extra          |
+------------+-----------------+------+-----+---------+----------------+
| id         | bigint unsigned | NO   | PRI | NULL    | auto_increment |
| name       | varchar(255)    | NO   |     | NULL    |                |
| created_at | timestamp       | YES  |     | NULL    |                |
| updated_at | timestamp       | YES  |     | NULL    |                |
| deleted_at | timestamp       | YES  |     | NULL    |                |
+------------+-----------------+------+-----+---------+----------------+
```

---

### 税率

```
mysql> desc tax_rates;
+------------+-----------------+------+-----+---------+----------------+
| Field      | Type            | Null | Key | Default | Extra          |
+------------+-----------------+------+-----+---------+----------------+
| id         | bigint unsigned | NO   | PRI | NULL    | auto_increment |
| rate       | double(8,2)     | NO   |     | NULL    |                |
| remarks    | varchar(255)    | YES  |     | NULL    |                |
| created_at | timestamp       | YES  |     | NULL    |                |
| updated_at | timestamp       | YES  |     | NULL    |                |
| deleted_at | timestamp       | YES  |     | NULL    |                |
+------------+-----------------+------+-----+---------+----------------+
```

---

### ユーザー

```
mysql> desc users;
+-------------------+-----------------+------+-----+---------+----------------+
| Field             | Type            | Null | Key | Default | Extra          |
+-------------------+-----------------+------+-----+---------+----------------+
| id                | bigint unsigned | NO   | PRI | NULL    | auto_increment |
| name              | varchar(255)    | NO   |     | NULL    |                |
| nickname          | varchar(255)    | YES  |     | NULL    |                |
| email             | varchar(255)    | NO   | UNI | NULL    |                |
| email_verified_at | timestamp       | YES  |     | NULL    |                |
| password          | varchar(255)    | NO   |     | NULL    |                |
| remember_token    | varchar(100)    | YES  |     | NULL    |                |
| created_at        | timestamp       | YES  |     | NULL    |                |
| updated_at        | timestamp       | YES  |     | NULL    |                |
| deleted_at        | timestamp       | YES  |     | NULL    |                |
+-------------------+-----------------+------+-----+---------+----------------+
```
