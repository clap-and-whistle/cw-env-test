# このリポジトリの目的

[koriym/env-json](https://github.com/koriym/Koriym.EnvJson) を使って遊んでみるも、思った挙動と違った。  
私の使い方が変なのかそれともissueと見るべきエラーに遭遇しているのか、ちょっと判らなかった。  
そこで再現コードを添えて作者さんに相談してみようと思った。

# 1. カレントの配布パッケージとドキュメントの不整合？

## 事象

- [ドキュメント](https://koriym.github.io/Koriym.EnvJson/README.ja) に従って、最初 `$ composer require koriym/env-json`
でインストールしたら 0.1.0 がインストールされた。
- これだと続く記述の `$env = (new EnvJson())->load(__DIR__);` の部分で0.1.0 では  load() が voidのため動作しなかった。
- 1.0.0alpha2版 を入れ直して動作できるようになった。

## 思ったこと

これって、ドキュメントは1.0.0alpha2向けに書かれてるけど配布パッケージがまだ0.1.0のままっていう不整合が起きてる？

# 2. 期待した挙動とちがう？

## 事象

- 上記によって動作するようにはなったが、今度はbooleanやintegerの定義をjsonスキーマに加えた場合に「String value found,」と言われてEnvJsonの load() でやってるバリデーションから進まない。
- そこで、EnvJsonのコードを読んでみた。
  1. [`private function putEnv(array $json): void`](https://github.com/koriym/Koriym.EnvJson/blob/c9456014b96bddd715380ccdad84de05a3ead3e4/src/EnvJson.php#L169) でどの値も一度stringへキャストされる。
  2. [private function collectEnvFromSchema(array $schema): stdClass](https://github.com/koriym/Koriym.EnvJson/blob/c9456014b96bddd715380ccdad84de05a3ead3e4/src/EnvJson.php#L195) 内では「getEnv() した値をスキーマに従ってキャストする処理」が入っていないように見る。
- EnvJson::load() 内のバリデーションで「String value found,」となるのは、上記 2. でキャスト戻しが行われていないからか？

## 思ったこと

これは、バグ？
