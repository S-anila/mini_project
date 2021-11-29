a=int(input("enter the start year"))
s=int(input("enter the end year"))
if(a<s):
    print("leap years are:",end="")
    for i in range(a,s):
        if(i%4==0 and i%100==0):
            print(i,end="")