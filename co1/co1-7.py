lst=[1,3,5,7,9,11,34]
lst1=[5,13,45,7,20,65,1]
s=int(0) 
c=int(0)

if len(lst)==len(lst1):
  print("Lists are of same length") 
else:
  print("Lists have different length")

for i in range(0,len(lst) and len(lst1)): 
  s=s+lst[i]
  c=c+lst1[i]
if(s==c):
  print("equal sum")
else:
  print("not same sum")

print("Elements that matched are:") 
l=[]
for i in range(0,len(lst)):
  for j in range(0,len(lst1)):
    if lst[i]==lst1[j]:
        l.append(lst[i] and lst1[j]) 
    else:
      continue
print(l)
