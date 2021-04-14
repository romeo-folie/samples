/*
    Write a javascript function that accepts two arrays and merges them to produce an interleaved output

    E.g

    var A = [1, 3, 5, 7, ‘c’]
    var B = [‘a’, 4, 6, ‘b’, 10, 12, 14]

    Output  = [1, ‘a’, 3, 4, 5, 6, 7, ‘b’, ‘c’, 10, 12, 14]
*/

const mergeArrays = function (array1, array2){
    let resArray = [];
    
    const arrayLength = array1.length > array2.length ? array1.length : array2.length

    for(let i = 0; i < arrayLength; i++){
        if(array1[i]) resArray.push(array1[i])
        if(array2[i]) resArray.push(array2[i])
    }

    return resArray;
}

// more efficient solution
const mergeArrays2 = function (array1, array2){
    const resArray = [];

    // use lengths to figure out which one is longer and which one is shorter 

    const longerArray = array1.length > array2.length ? array1 : array2;
    const shorterArrayLength = Math.min(array1.length, array2.length);
    
    for(let i = 0; i < shorterArrayLength; i++){
        resArray.push(array1[i])
        resArray.push(array2[i])
    }

    //concatenate the rest of the long array
    return resArray.concat(longerArray.slice(shorterArrayLength))
}

const A = [1, 3, 5, 7, 'c']
const B = ['a', 4, 6, 'b', 10, 12, 14]
console.log(mergeArrays2(A,B))

