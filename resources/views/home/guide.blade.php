<!-- 準備中 -->

<x-app-layout>
    <x-slot name="header">
        {{ __("利用案内") }}
    </x-slot>

    <div class="container mx-auto">
        <p>コンテンツ領域</p>
    </div>

    <div>
        <h2>約束</h2>
        <ol>
            <li>
                本棚の所蔵物は、貸出物です。各所蔵物の所有権は、貸し主（持ち主）にあります。
            </li>
            <li>この本棚は、メンバーシップ制です。</li>
            <li>開錠ナンバーは口外しないこと。</li>
        </ol>
    </div>
    <div>
        <h2>利用案内</h2>
        <dl>
            <dt>利用可能時間</dt>
            <dd></dd>
            <dt>駐車場</dt>
            <dd></dd>
            <dt>借出点数</dt>
            <dd></dd>
            <dt>返却期限</dt>
            <dd></dd>
            <p>※貸出点数と返却期限は目安です。多少の超過は構いません。</p>
        </dl>
    </div>
    <div>
        <h2>借り主の心得</h2>
        <ul>
            <li><借り主は、借りたものを大事に扱うこと。また紛失しないこと。</li>
            <li>借り出し時は、借出表の記入をお願いします。</li>
            <li>
                メンバー以外の人への又貸しは、基本的に禁止とします。又貸ししたい場合は、貸し主（持ち主）に相談してください。
            </li>
            <li>帰宅時は、施錠に関する以下の点を必ず確認してください。</li>
            <ul>
                <li>玄関の鍵が閉まっていること。</li>
                <li>
                    合鍵がキーボックスにしまってあり、またキーボックスの蓋がきちんと閉まっていること。
                </li>
                <li>ナンバーロックの数字が開錠状態になっていないこと</li>
            </ul>
        </ul>
    </div>
    <div>
        <h2>貸し主の心得</h2>
        <ul>
            <li>
                貸主は、最悪の場合、汚損・紛失してしまっても後悔がないものを貸し出すようにしましょう。
            </li>
            <li>貸出時は、蔵書表の記入をお願いします。</li>
            <li>
                貸出物が誰にも手にとってもらえていないようでも、落ち込まないように。気長に。
            </li>
        </ul>
    </div>

    <script>
        const app = new Vue({
            el: '#app',
            data: {
                isOpen: false,
            },
        });
    </script>
</x-app-layout>
