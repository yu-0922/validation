<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HelloMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next 無名クラスを表すためのクラス これを呼び出して実行することでミドルウェアからアプリケーションに送られるリクエストを作成することができる
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //コントローラーのアクションが実行され、その結果のレスポンスが$responseに代入
        $response = $next($request);
        //レスポンスに設定されているコンテンツを取得(送り返されるHTMLのソースコードのテキストが入っている)
        $content = $response->content();
        //<middleware>〇〇<\/middleware>というテキストを<a href="http://〇〇">〇〇</a>というテキストに置換
        //<middleware>タグにドメイン名を書いておけばリンクが自動生成されるようになる
        $pattern = '/<middleware>(.*)<\/middleware>/i';
        $replace = '<a href="http://$1">$1</a>';
        $content = preg_replace($pattern, $replace, $content);
        //レスポンスにコンテンツを設定(クライアントに返送されるコンテンツが変更された)
        $response->setContent($content);
        return $response;
    }
}
