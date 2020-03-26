
#tb1843 Prog assign. 2
import math
  

print("Type 'BMI' to calculate Body Mass Index.")
print("Type 'retire' to calculate age that Retirement Savings goal is reached.")
print("Type 'exit' to exit out of the program")
print("")
    
function = ("")

def BMI(inches, pounds):
    #BMI formula
    output = 703 * (pounds / (inches * inches))
    
    #Distinguish weight classß
    if (output < 18.5):
        print("Your Body Mass Index is",output,)
        print("You are underweight.")
        print("")

    elif( 18.5 <= output <= 24.9):
        print("Your Body Mass Index is",output,)
        print("You are normal weight.")
        print("")

    else:
        print("Your Body Mass Index is",output)
        print("You are overweight.")
        print("")
        
    return


def Retirement(age, salary, percent_saved, goal):
    temp = salary * percent_saved * (.01)
    employer = temp * 35 * (.01)
    total = employer + temp
    print (total)

    savings_goal = math.ceil((goal / total))
    
    print(savings_goal)
    goal_age = savings_goal + age
    if (goal_age >= 100):
        print("Your goal is unreacheable with the percentage saved.")

    else:
        print("You will be", goal_age,"years old when you meet your goal.")


    return


while (function != "exit"):
    function = input("Waiting for user: ")

    

    
    if (function == "BMI"):
        while True:          
            try:
                
                #take user input
                height = int(input("Height (Inches): "))
                weight = int(input("Weight (lbs.): "))
                print("")
                break
            except ValueError:
                print("")
                print("Invalid Input. Integers only")
                

        
        if (height <= 0 or weight <= 0):
            print("Must be an integer > 0")
            function = exit
            
        else: 
            #call BMI function 
            BMI(height, weight)


    if (function == "retire"):
        while True:
            try:
                
                #take user input
                age = int(input("Age: "))
                salary = int(input("Salary(do not type commas): "))
                percentage = int(input("Percentage saved(%): "))
                goal = int(input("Savings Goal($): "))
                print("")
                break
            except ValueError:
                print("Invalid input.")
                

        if (age <= 0 or salary <= 0 or goal <= 0):
            print("Invalid Input. Must be an integer greater than 0")
        else:      
            Retirement(age, salary, percentage, goal)

    
    
