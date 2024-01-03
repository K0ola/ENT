function discussion(){
    if(document.getElementById('discussion-box').classList.contains('hidden')){
        console.log('test');
        document.getElementById('discussion-box').classList.remove('hidden');
        document.getElementById('discussion-box').classList.add('visible');
    } else if(document.getElementById('discussion-box').classList.contains('visible')){
        console.log('hello you');
        document.getElementById('discussion-box').classList.remove('visible');
        document.getElementById('discussion-box').classList.add('hidden');
    }

}