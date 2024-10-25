/** コメント入力欄の文字数カウント */
document
    .addEventListener('DOMContentLoaded', function() {
        const commentInput = document.getElementById('inline-comment');
        const charCount = document.getElementById('char-count');
        const maxLength = 255;

        // 文字数の初期化 
        charCount.textContent = `${commentInput.value.length}/${maxLength} 文字`;
    
        // 文字数カウントの更新 
        commentInput
            .addEventListener('input', function() {
                const currentLength = commentInput.value.length;

                charCount.textContent = `${currentLength}/${maxLength} 文字`;

                if (currentLength > maxLength) {
                    commentInput.classList.remove('border-gray-200', 'focus:ring-teal-500', 'focus:border-transparent');
                    commentInput.classList.add('border-orange-500', 'focus:ring-orange-500', 'focus:border-white');
                    charCount.classList.add('text-orange-600');
                } else {
                    commentInput.classList.remove('border-orange-500', 'focus:ring-orange-500', 'focus:border-white');
                    commentInput.classList.add('border-gray-200', 'focus:ring-teal-500', 'focus:border-transparent');
                    charCount.classList.remove('text-orange-600');
                }
            });
    });