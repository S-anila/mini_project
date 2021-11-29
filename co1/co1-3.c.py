word=str(input("enter the word"))
print("the string is:",word)
for i in (word):
    if i in 'aeiouAEIOU':
        print([i],end="")