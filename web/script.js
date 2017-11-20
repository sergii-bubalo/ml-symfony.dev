function* gen() {
    yield 'qwerty1';
    yield 'qwerty2';
    yield 'qwerty3';
    yield 'qwerty4';

    return 'qwerty';
}

let g = gen();

console.log(`${g.next().value} ${g.next().done}`);
console.log(g.next());
console.log(g.next());
console.log(g.next());
console.log(g.next());
console.log(g.next());
