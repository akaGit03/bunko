<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Guide') }}
        </h2>
    </x-slot>

    <div id="app" class="bg-gray-500 lg:bg-blue-500">
    <div class="container mx-auto text-white">
        <div class="flex justify-between items-center">
            <h1 class="text-4xl font-semibold md:text-xl">HR</h1>
            <div>
                <button @click="isOpen = !isOpen" class="md:hidden">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                    <path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/>
                </svg>                       
                </button>
            </div>
        </div>
        <div :class="isOpen ? 'block' : 'hidden' ">
            <ul class="md:flex md:justify-around md:items-center">
                <li class="border-b md:border-none"><a href="#" class="block px-8 py-2 my-4 hover:bg-gray-600 rounded">HRとは</a></li>
                <li class="border-b md:border-none"><a href="#" class="block px-8 py-2 my-4 hover:bg-gray-600 rounded">機能一覧</a></li>
                <li class="border-b md:border-none"><a href="#" class="block px-8 py-2 my-4 hover:bg-gray-600 rounded">料金プラン</a></li>
                <li class="border-b md:border-none"><a href="#" class="block px-8 py-2 my-4 hover:bg-gray-600 rounded">お知らせ</a></li>
                <li class="flex item-center ">
                    <div class="my-8 md:my-4">
                        <a href="#" class="px-6 py-2 bg-orange-500 hover:bg-orange-400 rounded-full">お問い合わせ</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>  
</div>
<div class="container mx-auto">
    <p>コンテンツ領域</p>
</div>

<div>
    <h2>約束</h2>
    <ol>
        <li>本棚の所蔵物は、貸出物です。各所蔵物の所有権は、貸し主（持ち主）にあります。</li>
        <li>この本棚は、メンバーシップ制です。</li>
        <li>開錠ナンバーは口外しないこと。</li>
    </ol>
</div>
<div>
    <h2>利用案内</h2>
    <dl>
        <dt>利用可能時間</dt><dd></dd>
        <dt>駐車場</dt><dd></dd>
        <dt>借出点数</dt><dd></dd>
        <dt>返却期限</dt><dd></dd>
        <p>※貸出点数と返却期限は目安です。多少の超過は構いません。</p>
    </dl>
</div>
<div>
    <h2>借り主の心得</h2>
    <ul>
        <li><借り主は、借りたものを大事に扱うこと。また紛失しないこと。</li>
        <li>借り出し時は、借出表の記入をお願いします。</li>
        <li>メンバー以外の人への又貸しは、基本的に禁止とします。又貸ししたい場合は、貸し主（持ち主）に相談してください。</li>
        <li>帰宅時は、施錠に関する以下の点を必ず確認してください。</li>
        <ul>
            <li>玄関の鍵が閉まっていること。</li>
            <li>合鍵がキーボックスにしまってあり、またキーボックスの蓋がきちんと閉まっていること。</li>
            <li>ナンバーロックの数字が開錠状態になっていないこと</li>
        </ul>
    </ul>
</div>
<div>
    <h2>貸し主の心得</h2>
    <ul>
        <li>貸主は、最悪の場合、汚損・紛失してしまっても後悔がないものを貸し出すようにしましょう。</li>
        <li>貸出時は、蔵書表の記入をお願いします。</li>
        <li>貸出物が誰にも手にとってもらえていないようでも、落ち込まないように。気長に。</li>
    </ul>
</div>

<script>
    const app = new Vue({
        el : '#app',
        data: {
            isOpen: false,
        }
    })
</script>
</x-app-layout>