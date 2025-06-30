@extends('layouts.app')

@section('content')
<div x-data="chatFaq()" class="max-w-2xl mx-auto bg-[#182328] text-white rounded-lg shadow h-[500px] flex flex-col">

    <!-- Header -->
    <div class="p-4 border-b border-gray-700">
        <h2 class="text-xl font-bold">🤖 Chat FAQ</h2>
    </div>

    <!-- Scrollable chat area -->
    <div id="chatBox" class="flex-1 overflow-y-auto px-4 py-2 space-y-2">
        <template x-for="(message, index) in messages" :key="index">
            <div class="flex" :class="message.from === 'user' ? 'justify-end' : 'justify-start'">
                <div class="px-4 py-2 rounded-lg max-w-xs text-sm"
                     :class="message.from === 'user' ? 'bg-blue-600' : 'bg-gray-700'">
                    <span x-text="message.text"></span>
                </div>
            </div>
        </template>
    </div>

    <!-- Fixed input area -->
    <div class="p-4 border-t border-gray-700">
        <form @submit.prevent="handleInput" class="flex space-x-2">
            <input x-model="userInput" type="text" placeholder="Type 1, 2, 3..."
                   class="w-full rounded px-3 py-2 bg-gray-800 border border-gray-600 text-white focus:outline-none focus:ring focus:ring-yellow-500">
            <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-black font-semibold px-4 py-2 rounded">
                Send
            </button>
        </form>
    </div>
</div>


<script>
function chatFaq() {
    return {
        userInput: '',
        messages: [
            { from: 'bot', text: '👋 Hello! Saya adalah asisten elektronik FOUNDIT yang akan membantu menjawab beberapa pertanyaan anda , Tuliskan nomor pertanyaang yang ingin anda tanyakann ! ' },
            @foreach ($faq as $i => $item)
                { from: 'bot', text: '{{ ($i+1) . ". " . $item["q"] }}' },
            @endforeach
        ],
        faqs: @json(array_column($faq, 'a')),
        handleInput() {
            const input = this.userInput.trim();
            if (!input) return;

            this.messages.push({ from: 'user', text: input });

            const index = parseInt(input);
            if (!isNaN(index) && index >= 1 && index <= this.faqs.length) {
                this.messages.push({ from: 'bot', text: this.faqs[index - 1] });
            } else {
                this.messages.push({ from: 'bot', text: "❓ Maaf saya tidak mengenali input anda , coba pilih salah satu pertanyaan diatas ! ." });
            }

            this.userInput = '';

            this.$nextTick(() => {
                const chatBox = document.getElementById('chatBox');
                chatBox.scrollTop = chatBox.scrollHeight;
            });
        }
    }
}
</script>
@endsection
