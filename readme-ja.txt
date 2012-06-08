=== Rollover Tab ===
Tags: タブ, ショートコード, グラフィカル, スタイルシート, css, javascript, js
Requires at least: 3.1
Tested up to: 3.3.2
Stable tag: 1.0.1
Contributors: Eiji 'Sabaoh' Yamada
License: GPLv2

グラフィカルなタブ付きパネルを使えるショートコードのプラグインです。


== 解説 ==

このプラグインは、投稿や固定ページにグラフィカルなタブ付きパネルを作るための2つのショートコードを定義します。テーマのスタイルシートやテンプレートに手を加える必要はありません。正しく表示するにはIE以外のブラウザ（Chrome, FireFox, Opera, Safariでテスト済みです)か、IE8以上が必要です。IE7以下では普通の&lt;ul&gt;リストが表示され、別なブラウザを使うかIEを8以上にアップデートすることを推奨するメッセージが表示されます。

注意: リッチテキストエディタで投稿やページを編集する際に、隣接する2つのショートコードの間に改行を入れないでください。例えば[rollover-tabs]と[rollover-tab]の間や、[/rollover-tab]と次の[rollover-tab]の間などにです。改行を入れるとワードプレスが勝手に&lt;p&gt;タグをつけてしまうので、表示が崩れます。


= 機能 =

* [rollover-tabs]ショートコードでタブ付きパネルを開始します。
* [rollover-tabs]と[/rollober-tabs]の間に、[rollover-tab name="..." label="..."]...[/rollover-tab]を使ってひとつひとつのタブ（パネル）を作ります。
* リッチなグラフィックでタブを表示します。
* デフォルトではタブにマウスを重ねるだけでタブが切り替わります。オプションでクリックしないと切り替わらないようにもできます。


== インストール ==

* ダウンロードした圧縮ファイルをwordpress/wp-content/plugins/フォルダに展開してください。
* サイトのダッシュボードにアクセスして、プラグインを有効にしてください。
* ショートコードを使って投稿やページにタブ付きパネルを作ってください。


== FAQ ==

= タブが一直線に並びません。下りの階段のようです。 =

リッチテキストエディタを使って、ショートコードとショートコードの間に改行を入れていませんか？

例:
<pre>
[rollover-tabs]
[rollover-tab name="tab1" label="Sample1"]
Sample
This is a sample.
[/rollover-tab]
[rollover-tab name="tab2" label="For example"]
Example
This is example.
[/rollover-tab]
[/rollover-tabs]
</pre>
上の例は誤りです。正しいのは下の例です。
<pre>
[rollover-tabs][rollover-tab name="tab1" label="Sample1"]
Sample
This is a sample.
[/rollover-tab][rollover-tab name="tab2" label="For example"]
Example
This is example.
[/rollover-tab][/rollover-tabs]
</pre>

= クリックした時にタブが切り替わるようにしたい。 =

[rollover-tabs]のnorollover属性を"true"と指定してください。

例:
<pre>
[rollover-tabs norollover="true"][rollover-tab name="tab1" label="Sample1"]
Sample
...
</pre>

= ひとつの投稿（またはページ）で複数のタブ付きパネルを使いたい。 =

[rollover-tabs]のname属性を投稿（ページ）内でユニークになるように指定してください。

例:
<pre>
[rollover-tabs name="tabs1"][rollover-tab name="tab1" label="Sample1"]
Sample
...
[/rollover-tab][/rollover-tabs]
...
[rollover-tabs name="tabs2"][...
</pre>


== 詳しくは ==

http://sabaoh.sakura.ne.jp/wordpress/を御覧ください。


== 変更履歴 ==
= 1.0.1 =
クリックして切り替えにする機能のバグフィックス
= 1.0.0 =
初回リリース。
