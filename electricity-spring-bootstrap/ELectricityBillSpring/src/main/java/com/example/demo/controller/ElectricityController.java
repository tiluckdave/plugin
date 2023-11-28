package com.example.demo.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;



@Controller
public class ElectricityController {

@GetMapping("/calculate")
public String showCalculator()
{
	return "calculator";
}

@PostMapping("/calculate")
public String calculateBill(@RequestParam("units")int units, Model model)
{
	double bill = calculateElectricityBill(units);
	model.addAttribute("units",units);
	model.addAttribute("bill",bill);
	return "calculator";
	
}

private double calculateElectricityBill(int units) {
	// TODO Auto-generated method stub
	
	double calculatedBill = 0;
	
	if(units <= 50)
	{
		calculatedBill = units * 3.50;
	}
	else if(units <= 150)
	{
		 calculatedBill = 50 * 3.50 + (units - 50) * 4.00;
	}
	else if (units <= 250) 
	{
        calculatedBill = 50 * 3.50 + 100 * 4.00 + (units - 150) * 5.20;
    } 
	else 
	{
        calculatedBill = 50 * 3.50 + 100 * 4.00 + 100 * 5.20 + (units - 250) * 6.50;
    }
	return calculatedBill;
	}
}
